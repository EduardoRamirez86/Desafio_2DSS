@extends('layouts.app')
@section('content')
    <h1>Categorías de Productos</h1>
    @foreach($categories as $category)
        <h2>{{ $category->nombre }}</h2>
        <div class="row mb-4">
            @forelse($category->products as $product)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->nombre }}">
                        <div class="card-body">
                            <h5>{{ $product->nombre }}</h5>
                            <p>Precio: ${{ number_format($product->precio, 2) }}</p>
                            <p>Stock: {{ $product->stock }}</p>
                            @if($product->stock > 0)
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <input type="number" name="cantidad" value="1" min="1" max="{{ $product->stock }}" class="form-control d-inline w-25">
                                    <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                                </form>
                            @else
                                <button class="btn btn-secondary" disabled>Sold Out</button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p>No hay productos en esta categoría.</p>
            @endforelse
        </div>
    @endforeach
@endsection