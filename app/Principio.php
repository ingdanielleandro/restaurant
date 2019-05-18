<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Principio extends Model
{
    protected $table = 'principios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'estado',
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
