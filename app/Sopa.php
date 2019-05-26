<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sopa extends Model
{
    protected $table = 'sopas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'estado', 'disponible',
    ];

        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'estado' => 'boolean',
        'disponible' => 'boolean',
    ];
}
