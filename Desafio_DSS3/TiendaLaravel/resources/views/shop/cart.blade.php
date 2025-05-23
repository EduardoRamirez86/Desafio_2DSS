@extends('layouts.app')
@section('content')
    <h1>Tu Carrito de Compras</h1>
    @if(!empty($cart))
        <table class="table table-bordered">
            <thead><tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Acción</th></tr></thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $subtotal = $item['product']['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                    <tr>
                        <td>{{ $item['product']['nombre'] }}</td>
                        <td>${{ number_format($item['product']['precio'], 2) }}</td>
                        <td>{{ $item['cantidad'] }}</td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr><td colspan="3"><strong>Total:</strong></td><td colspan="2">${{ number_format($total, 2) }}</td></tr>
            </tbody>
        </table>
        <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceder a Comprar</a>
    @else
        <p>Tu carrito está vacío.</p>
    @endif
@endsection