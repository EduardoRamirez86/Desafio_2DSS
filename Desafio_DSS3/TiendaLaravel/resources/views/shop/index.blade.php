@extends('layouts.app')

@section('content')
    {{-- HERO PRINCIPAL --}}
    <div id="principal" class="relative w-full rounded-5 p-5 mb-5 text-white overflow-hidden">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 bg-[url('{{ asset('img/principal.jpg') }}')] bg-cover bg-center"
            style="filter: brightness(0.6);"></div>

        <!-- Degradado oscuro encima -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 to-black/40"></div>

        <!-- Contenido principal -->
        <div class="relative z-10 flex flex-col h-full justify-center items-center text-center">
            <h1 class="text-4xl font-bold">MixSabores</h1>
            <p class="text-lg mt-4 max-w-2xl">
                Nos enfocamos en ofrecerte lo mejor en sabor, frescura y nutrición,
                seleccionando cuidadosamente cada producto para garantizar tu bienestar
                y el de tu familia. ¡Disfruta de una experiencia de compra fácil, segura y deliciosa!
            </p>
            <a href="#main-content" class="mt-5 btn btn-primary btn-lg">
                Comenzar a explorar
            </a>
        </div>
    </div>


    {{-- LISTADO DE CATEGORÍAS Y PRODUCTOS --}}
    <div id="main-content" class="container">
        <h1 class="py-4">Categorías de Productos</h1>

        @foreach($categories as $category)
            <h2 class="mt-5">{{ $category->nombre }}</h2>
            <div class="row mb-4">
                @forelse($category->products as $product)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="{{ asset($product->image_url) }}" class="card-img-top" alt="{{ $product->nombre }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->nombre }}</h5>
                                <p class="card-text">
                                    Precio: ${{ number_format($product->precio, 2) }}
                                </p>
                                <p class="card-text">
                                    Stock: {{ $product->stock }}
                                </p>

                                @if($product->stock > 0)
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST"
                                        class="d-flex align-items-center">
                                        @csrf
                                        <input type="number" name="cantidad" value="1" min="1" max="{{ $product->stock }}"
                                            class="form-control me-2" style="width: 80px;">
                                        <button type="submit" class="btn btn-primary">
                                            Agregar al carrito
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary" disabled>
                                        Sold Out
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No hay productos en esta categoría.</p>
                @endforelse
            </div>
        @endforeach
    </div>
@endsection