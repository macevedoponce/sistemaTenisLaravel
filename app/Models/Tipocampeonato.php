<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipocampeonato
 *
 * @property $id
 * @property $nombreTipoCampeonato
 * @property $created_at
 * @property $updated_at
 *
 * @property Campeonato[] $campeonatos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipocampeonato extends Model
{
    
    static $rules = [
		'nombreTipoCampeonato' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombreTipoCampeonato'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function campeonatos()
    {
        return $this->hasMany('App\Models\Campeonato', 'tipo_campeonato_id', 'id');
    }
    

}
