<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuentas = Cuenta::all();
        return view('cuentas.index', compact('cuentas'));
    }

    public function create(){
        return view('cuentas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cuenta = new Cuenta();
        $cuenta->nombre_cliente = $request->nombre_cliente;
        $cuenta->numero_cuenta = $request->numero_cuenta;
        $cuenta->tipo_cuenta = $request->tipo_cuenta;
        $cuenta->saldo = $request->saldo;
        $cuenta->save();
        return redirect()->route('cuentas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
