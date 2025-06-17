<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Movimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(String $id)
    {
        $cuenta = Cuenta::findOrFail($id);
        $movimientos = $cuenta->movimientos()->latest()->get();
        return view('movimientos.index', compact('movimientos', 'cuenta'));
    }

    // muestran la vista ingreso y retiro por id
    public function ingreso(String $id)
    {
        $cuenta = Cuenta::FindOrFail($id);
        return view('movimientos.ingreso', compact('cuenta'));
    }

    public function retiro(String $id)
    {
        $cuenta = Cuenta::FindOrFail($id);
        return view('movimientos.retiro', compact('cuenta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $cuentaId)
    {
        $request->validate([
            'monto' => 'required|numeric|min:0.01',
            'tipo' => 'required|in:ingreso,retirada',
        ]);

        $cuenta = Cuenta::findOrFail($cuentaId);

        try {
            DB::transaction(function () use ($request, $cuenta) {
                $monto = $request->monto;
                $tipo = $request->tipo;

                if ($tipo === 'retirada') {
                    if ($cuenta->saldo < $monto) {
                        throw new \Exception('Saldo insuficiente');
                    }
                    $cuenta->saldo -= $monto;
                } else {
                    $cuenta->saldo += $monto;
                }
                $cuenta->save();

                Movimiento::create([
                    'cuenta_id' => $cuenta->id,
                    'monto' => $monto,
                    'tipo' => $tipo,
                ]);
            });
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('movimientos.index', $cuentaId)
            ->with('success', 'Movimiento realizado con éxito');
    }
}
