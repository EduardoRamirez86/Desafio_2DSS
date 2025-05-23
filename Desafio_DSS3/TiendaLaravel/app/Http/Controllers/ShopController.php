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
        $cantidad = (int) $request->input('cantidad', 1);

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

        // Ajustamos stock en tiempo real
        $product->stock -= $cantidad;
        $product->save();

        return redirect()->route('cart.index');
    }

    public function removeFromCart($id)
    {
        $cart = session('cart', []);
        if (isset($cart[$id])) {
            $product = Product::find($id);
            if ($product) {
                $product->stock += $cart[$id]['cantidad'];
                $product->save();
            }
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
    $validated = $request->validate([
        'buyer_name'   => [
            'required',
            'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]{3,50}$/',
        ],
        'dui'          => [
            'required',
            // ahora pedimos 8 dígitos + '-' + 1 dígito
            'regex:/^\d{8}-\d{1}$/',
        ],
        'card_number'  => [
            'required',
            'regex:/^\d{4}-\d{4}-\d{4}-\d{4}$/',
        ],
        'exp_date'     => [
            'required',
            'regex:/^(0[1-9]|1[0-2])\/\d{2}$/',
        ],
        'buyer_email'  => [
            'required',
            'email', // regla nativa de Laravel, sin patrón manual
        ],
    ], [
        'buyer_name.required'   => 'El nombre es obligatorio.',
        'buyer_name.regex'      => 'El nombre debe tener entre 3 y 50 letras y espacios solamente.',
        'dui.required'          => 'El DUI es obligatorio.',
        'dui.regex'             => 'El DUI debe tener el formato 12345678-9.',
        'card_number.required'  => 'El número de tarjeta es obligatorio.',
        'card_number.regex'     => 'El número de tarjeta debe tener 16 dígitos con guiones (1234-5678-9012-3456).',
        'exp_date.required'     => 'La fecha de vencimiento es obligatoria.',
        'exp_date.regex'        => 'La fecha de vencimiento debe ser MM/AA (ej. 12/25).',
        'buyer_email.required'  => 'El correo electrónico es obligatorio.',
        'buyer_email.email'     => 'El correo electrónico no tiene un formato válido.',
    ]);

    // — resto de tu lógica de checkout —
    $cart = session('cart', []);
    foreach ($cart as $id => $item) {
        if ($p = Product::find($id)) {
            $p->stock -= $item['cantidad'];
            $p->save();
        }
    }
    session()->forget('cart');

    return view('shop.success', [
        'buyer_name'  => $validated['buyer_name'],
        'buyer_email' => $validated['buyer_email'],
    ]);
}

}

