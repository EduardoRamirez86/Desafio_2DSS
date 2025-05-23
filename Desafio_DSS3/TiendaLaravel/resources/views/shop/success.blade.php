@extends('layouts.app')
@section('content')
    <div class="alert alert-success">
        <h2>✅ Compra realizada exitosamente</h2>
        <p>Gracias, <strong>{{ $buyer_name }}</strong></p>
        <p>Confirmación enviada a: <em>{{ $buyer_email }}</em></p>
        <a href="{{ route('shop.index') }}" class="btn btn-primary">Volver a la Tienda</a>
    </div>
@endsection