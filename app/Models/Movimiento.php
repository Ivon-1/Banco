<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Movimiento
 * 
 * @property int $id
 * @property int $cuenta_id
 * @property float $monto
 * @property string $tipo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Cuenta $cuenta
 *
 * @package App\Models
 */
class Movimiento extends Model
{
	protected $table = 'movimientos';

	protected $casts = [
		'cuenta_id' => 'int',
		'monto' => 'float'
	];

	protected $fillable = [
		'cuenta_id',
		'monto',
		'tipo'
	];

	public function cuenta()
	{
		return $this->belongsTo(Cuenta::class);
	}
}
