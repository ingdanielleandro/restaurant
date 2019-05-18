<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejecutivo extends Model
{
    protected $table = 'ejecutivos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'estado', 'precio'
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
