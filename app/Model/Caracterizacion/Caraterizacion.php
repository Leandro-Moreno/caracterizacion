<?php

namespace App\Model\Caracterizacion;

use Illuminate\Database\Eloquent\Model;

class Caracterizacion extends Model
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
        return $this->belongsTo('App\Model\Eventos\Firma', 'firma_id');
    }
    
}
