<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Partido
 *
 * @property $id
 * @property $campeonato_id
 * @property $categoria_id
 * @property $fechaPartido
 * @property $horaPartido
 * @property $jugador1_id
 * @property $jugador2_id
 * @property $numero_sets
 * @property $created_at
 * @property $updated_at
 *
 * @property Campeonato $campeonato
 * @property Categoria $categoria
 * @property Participante $participante
 * @property Participante $participante
 * @property Resultado[] $resultados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Partido extends Model
{
    
    static $rules = [
		'campeonato_id' => 'required',
		'categoria_id' => 'required',
		'fechaPartido' => 'required',
		'horaPartido' => 'required',
		'jugador1_id' => 'required',
		'jugador2_id' => 'required',
		'numero_sets' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['campeonato_id','categoria_id','fechaPartido','horaPartido','jugador1_id','jugador2_id','numero_sets'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function campeonato()
    {
        return $this->hasOne('App\Models\Campeonato', 'id', 'campeonato_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function participante()
    {
        return $this->hasOne('App\Models\Participante', 'id', 'jugador1_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function participante()
    {
        return $this->hasOne('App\Models\Participante', 'id', 'jugador2_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resultados()
    {
        return $this->hasMany('App\Models\Resultado', 'partido_id', 'id');
    }
    

}
