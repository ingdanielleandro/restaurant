<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corriente extends Model
{
    protected $table = 'corrientes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estado',
    ];

        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'estado'=> 'boolean',
    ];
}
