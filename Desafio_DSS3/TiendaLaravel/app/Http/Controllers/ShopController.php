<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        return view('shop.index', compact('categories'));
    }

    public function cart()
    {
        $cart = session('cart', []);
        return view('shop.cart', compact('cart'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cantidad = $request->input('cantidad', 1);

        if ($product->stock < $cantidad) {
            return redirect()->back()->with('error', 'Stock insuficiente.');
        }

        $cart = session('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['cantidad'] += $cantidad;
        } else {
            $cart[$id] = ['product' => $product, 'cantidad' => $cantidad];
        }
        session(['cart' => $cart]);
        $product->stock -= $cantidad;
        $product->save();

        return redirect()->route('cart.index');
    }

    public function removeFromCart($id)
    {
        $cart = session('cart', []);
        if (isset($cart[$id])) {
            $product = Product::find($id);
            $product->stock += $cart[$id]['cantidad'];
            $product->save();
            unset($cart[$id]);
            session(['cart' => $cart]);
        }
        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('shop.index')->with('error', 'El carrito está vacío.');
        }
        return view('shop.checkout');
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'buyer_name' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,50}$/',
            'dui' => 'required|regex:/^\d{8}-\d$/',
            'card_number' => 'required|regex:/^\d{4}-\d{4}-\d{4}-\d{4}$/',
            'exp_date' => 'required|regex:/^(0[1-9]|1[0-2])\/\d{2}$/',
            'buyer_email' => 'required|email',
        ]);

        $cart = session('cart', []);
        foreach ($cart as $id => $item) {
            $product = Product::find($id);
            $product->stock -= $item['cantidad'];
            $product->save();
        }
        session()->forget('cart');

        return view('shop.success', $request->only(['buyer_name', 'buyer_email']));
    }
}
