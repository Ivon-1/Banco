<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuenta
 * 
 * @property int $id
 * @property string $nombre_cliente
 * @property string $numero_cuenta
 * @property string $tipo_cuenta
 * @property float $saldo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Movimiento[] $movimientos
 *
 * @package App\Models
 */
class Cuenta extends Model
{
	protected $table = 'cuentas';

	protected $casts = [
		'saldo' => 'float'
	];

	protected $fillable = [
		'nombre_cliente',
		'numero_cuenta',
		'tipo_cuenta',
		'saldo'
	];

	public function movimientos()
	{
		return $this->hasMany(Movimiento::class);
	}
}
