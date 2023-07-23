<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Partido
 *
 * @property $id
 * @property $nombrePartido
 * @property $campeonato_id
 * @property $categoria_id
 * @property $jugador1_id
 * @property $jugador2_id
 * @property $fecha_partido
 * @property $hora_partido
 * @property $cancha
 * @property $created_at
 * @property $updated_at
 *
 * @property Campeonato $campeonato
 * @property Categoria $categoria
 * @property Inscrito $inscrito
 * @property Inscrito $inscrito
 * @property Resultado[] $resultados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Partido extends Model
{
    
    static $rules = [
		'nombrePartido' => 'required',
		'campeonato_id' => 'required',
		'categoria_id' => 'required',
		'jugador1_id' => 'required',
		'jugador2_id' => 'required',
		'fecha_partido' => 'required',
		'hora_partido' => 'required',
		'cancha' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombrePartido','campeonato_id','categoria_id','jugador1_id','jugador2_id','fecha_partido','hora_partido','cancha'];


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
    public function inscrito1()
    {
        return $this->hasOne('App\Models\Inscrito', 'id', 'jugador1_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function inscrito2()
    {
        return $this->hasOne('App\Models\Inscrito', 'id', 'jugador2_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resultados()
    {
        return $this->hasMany('App\Models\Resultado', 'partido_id', 'id');
    }
    

}
