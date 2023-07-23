<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Inscrito
 *
 * @property $id
 * @property $nombre_equipo
 * @property $campeonato_id
 * @property $categoria_id
 * @property $jugador1_id
 * @property $jugador2_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Campeonato $campeonato
 * @property Categoria $categoria
 * @property Participante $participante
 * @property Participante $participante
 * @property Partido[] $partidos
 * @property Partido[] $partidos
 * @property Resultado[] $resultados
 * @property Resultado[] $resultados
 * @property Set[] $sets
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Inscrito extends Model
{
    
    static $rules = [
		'nombre_equipo' => 'required',
		'campeonato_id' => 'required',
		'categoria_id' => 'required',
		'jugador1_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_equipo','campeonato_id','categoria_id','jugador1_id','jugador2_id'];


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
    public function participante1()
    {
        return $this->hasOne('App\Models\Participante', 'id', 'jugador1_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function participante2()
    {
        return $this->hasOne('App\Models\Participante', 'id', 'jugador2_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partidos1()
    {
        return $this->hasMany('App\Models\Partido', 'jugador1_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partidos2()
    {
        return $this->hasMany('App\Models\Partido', 'jugador2_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resultados1()
    {
        return $this->hasMany('App\Models\Resultado', 'ganador_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resultados2()
    {
        return $this->hasMany('App\Models\Resultado', 'perdedor_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sets()
    {
        return $this->hasMany('App\Models\Set', 'inscrito_id', 'id');
    }
    

}
