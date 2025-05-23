@extends('layouts.app')
@section('content')
    <h1>Simulación de Compra</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('checkout.process') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="buyer_name">Nombre</label>
            <input type="text" name="buyer_name" id="buyer_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="dui">DUI</label>
            <input type="text" name="dui" id="dui" class="form-control" placeholder="12345678-9" required>
        </div>
        <div class="mb-3">
            <label for="card_number">Tarjeta</label>
            <input type="text" name="card_number" id="card_number" class="form-control" placeholder="1234-5678-9012-3456" required>
        </div>
        <div class="mb-3">
            <label for="exp_date">Fecha Vencimiento</label>
            <input type="text" name="exp_date" id="exp_date" class="form-control" placeholder="MM/AA" required>
        </div>
        <div class="mb-3">
            <label for="buyer_email">Email</label>
            <input type="email" name="buyer_email" id="buyer_email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success btn-lg w-100">Finalizar Compra</button>
    </form>
@endsection