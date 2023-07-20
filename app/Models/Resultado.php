<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resultado
 *
 * @property $id
 * @property $partido_id
 * @property $set_numero
 * @property $resultado_jugador1
 * @property $resultado_jugador2
 * @property $ganador
 * @property $created_at
 * @property $updated_at
 *
 * @property Partido $partido
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Resultado extends Model
{
    
    static $rules = [
		'partido_id' => 'required',
		'set_numero' => 'required',
		'resultado_jugador1' => 'required',
		'resultado_jugador2' => 'required',
		'ganador' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['partido_id','set_numero','resultado_jugador1','resultado_jugador2','ganador'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function partido()
    {
        return $this->hasOne('App\Models\Partido', 'id', 'partido_id');
    }
    

}
