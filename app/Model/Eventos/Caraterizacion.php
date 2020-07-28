<?php

namespace App\Model\Eventos;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'caracterizacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pregunta1', 'pregunta2', 'horaEntrada', 'horaSalida', 'pregunta3', 'pregunta4','viabilidad', 'revision1', 'revision2', 'observacion', 'notas', 'envio'
    ];

    public function unidad()
    {
        return $this->belongsTo('App\Model\Caracterizacion\Unidad', 'unidad_id');
    }
    
}
