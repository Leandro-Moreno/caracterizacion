<?php

namespace App\Model\Eventos;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'ev_eventos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estado', 'nombre', 'descripcion', 'imagen', 'fecha', 'firma_id','firma2_id', 'hora'
    ];

    public function firma()
    {
        return $this->belongsTo('App\Model\Eventos\Firma', 'firma_id');
    }
    public function firma2()
    {
        return $this->belongsTo('App\Model\Eventos\Firma', 'firma2_id');
    }
}
