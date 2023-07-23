<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resultado
 *
 * @property $id
 * @property $partido_id
 * @property $ganador_id
 * @property $perdedor_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Inscrito $inscrito
 * @property Inscrito $inscrito
 * @property Partido $partido
 * @property Set[] $sets
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Resultado extends Model
{
    
    static $rules = [
		'partido_id' => 'required',
		'ganador_id' => 'required',
		'perdedor_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['partido_id','ganador_id','perdedor_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function perdedor()
    {
        return $this->hasOne('App\Models\Inscrito', 'id', 'perdedor_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ganador()
    {
        return $this->hasOne('App\Models\Inscrito', 'id', 'ganador_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function partido()
    {
        return $this->hasOne('App\Models\Partido', 'id', 'partido_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sets()
    {
        return $this->hasMany('App\Models\Set', 'resultado_id', 'id');
    }
    

}
