<?php

namespace App\Model\Eventos;

use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    protected $table = 'ev_firmas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'nombre', 'area', 'cargo', 'imagen'
        ];
}
