@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear Nueva Cuenta</h3>
        </div>
        <div class="card-body">
            <form action="{{route('cuentas.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
                    <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" required>
                </div>

                <div class="mb-3">
                    <label for="numero_cuenta" class="form-label">Número de Cuenta</label>
                    <input type="text" class="form-control" id="numero_cuenta" name="numero_cuenta" readonly>
                </div>

                <div class="mb-3">
                    <label for="tipo_cuenta" class="form-label">Tipo de Cuenta</label>
                    <select class="form-select" id="tipo_cuenta" name="tipo_cuenta" required>
                        <option value="Corriente">Corriente</option>
                        <option value="Ahorro">Ahorro</option>
                        <option value="Empresa">Empresa</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="saldo" class="form-label">Saldo Inicial</label>
                    <input type="number" class="form-control" id="saldo" name="saldo" required min="0">
                </div>

                <button type="submit" class="btn btn-primary">Crear Cuenta</button>
            </form>
        </div>
    </div>

    <script>
        function generarNumeroCuenta() {
            let numeroCuenta = '';
            for (let i = 0; i < 16; i++) {
                numeroCuenta += Math.floor(Math.random() * 10);
            }
            return numeroCuenta;
        }
        document.getElementById('numero_cuenta').value = generarNumeroCuenta();
    </script>
@endsection
