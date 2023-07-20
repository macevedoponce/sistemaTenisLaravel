<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Participante
 *
 * @property $id
 * @property $dni
 * @property $apellidosNombres
 * @property $fecha_nacimiento
 * @property $genero_id
 * @property $num_celular
 * @property $created_at
 * @property $updated_at
 *
 * @property Genero $genero
 * @property Partido[] $partidos
 * @property Partido[] $partidos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Participante extends Model
{
    
    static $rules = [
		'dni' => 'required',
		'apellidosNombres' => 'required',
		'fecha_nacimiento' => 'required',
		'genero_id' => 'required',
		'num_celular' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dni','apellidosNombres','fecha_nacimiento','genero_id','num_celular'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function genero()
    {
        return $this->hasOne('App\Models\Genero', 'id', 'genero_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partidos()
    {
        return $this->hasMany('App\Models\Partido', 'jugador1_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partidos()
    {
        return $this->hasMany('App\Models\Partido', 'jugador2_id', 'id');
    }
    

}
