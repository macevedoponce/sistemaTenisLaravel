<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Campeonato
 *
 * @property $id
 * @property $nombreCampeonato
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $tipo_campeonato_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Inscrito[] $inscritos
 * @property Partido[] $partidos
 * @property Tipocampeonato $tipocampeonato
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Campeonato extends Model
{
    
    static $rules = [
		'nombreCampeonato' => 'required',
		'fecha_inicio' => 'required',
		'fecha_fin' => 'required',
		'tipo_campeonato_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombreCampeonato','fecha_inicio','fecha_fin','tipo_campeonato_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscritos()
    {
        return $this->hasMany('App\Models\Inscrito', 'campeonato_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partidos()
    {
        return $this->hasMany('App\Models\Partido', 'campeonato_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipocampeonato()
    {
        return $this->hasOne('App\Models\Tipocampeonato', 'id', 'tipo_campeonato_id');
    }
    

}
