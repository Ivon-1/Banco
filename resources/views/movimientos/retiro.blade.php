@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Retirar Dinero - Cuenta de {{ $cuenta->nombre_cliente }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Nombre del Cliente:</strong> {{ $cuenta->nombre_cliente }}</p>
            <p><strong>Número de Cuenta:</strong> {{ $cuenta->numero_cuenta }}</p>
            <p><strong>Saldo Disponible:</strong> ${{ number_format($cuenta->saldo, 2) }}</p>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('movimiento.retirar', $cuenta->id) }}" method="POST">
                @csrf
                <input type="hidden" name="tipo" value="retirada">
                <div class="mb-3">
                    <label for="monto" class="form-label">Dinero a Retirar</label>
                    <input type="number" name="monto" id="monto" class="form-control" min="1" required>
                </div>
                <button type="submit" class="btn btn-primary">Sacar Dinero</button>
            </form>
        </div>
    </div>
@endsection
