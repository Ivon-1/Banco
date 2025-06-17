@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Movimientos de la Cuenta: {{ $cuenta->numero_cuenta }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $movimiento)
                    <tr>
                        <td>{{ $movimiento->id }}</td>
                        <td>{{ $movimiento->tipo }}</td>
                        <td>{{ $movimiento->monto }}</td>
                        <td>{{ $movimiento->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection