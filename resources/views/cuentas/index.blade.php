@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Lista de Cuentas Bancarias</h3>
            <a href="{{ route('cuentas.create') }}" class="btn btn-primary">Crear Cuenta</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre del Cliente</th>
                        <th>Número de Cuenta</th>
                        <th>Tipo de Cuenta</th>
                        <th>Saldo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cuentas as $cuenta)
                        <tr>
                            <td>{{ $cuenta->nombre_cliente }}</td>
                            <td>{{ $cuenta->numero_cuenta }}</td>
                            <td>{{ $cuenta->tipo_cuenta }}</td>
                            <td>{{number_format($cuenta->saldo, 2)}}€</td>
                            <td>
                                <a href="{{ route('movimiento.retiro', $cuenta->id) }}" class="btn btn-warning">Retirar Dinero</a>
                                <a href="{{ route('movimiento.ingreso', $cuenta->id) }}" class="btn btn-success">Ingresar Dinero</a>
                                <a href="{{ route('movimientos.index', $cuenta->id) }}" class="btn btn-info">Ver Movimientos</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
