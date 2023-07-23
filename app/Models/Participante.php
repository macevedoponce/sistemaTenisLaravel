<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Participante
 *
 * @property $id
 * @property $dni
 * @property $apellidos_nombres
 * @property $fecha_nacimiento
 * @property $celular
 * @property $genero_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Genero $genero
 * @property Inscrito[] $inscritos
 * @property Inscrito[] $inscritos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Participante extends Model
{
    
    static $rules = [
		'dni' => 'required',
		'apellidos_nombres' => 'required',
		'fecha_nacimiento' => 'required',
		'celular' => 'required',
		'genero_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dni','apellidos_nombres','fecha_nacimiento','celular','genero_id'];


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
    public function inscritos1()
    {
        return $this->hasMany('App\Models\Inscrito', 'jugador1_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscritos2()
    {
        return $this->hasMany('App\Models\Inscrito', 'jugador2_id', 'id');
    }
    

}
