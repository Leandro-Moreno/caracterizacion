<?php

namespace App\Model\Eventos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Asistente extends Model
{
    use Notifiable;

    protected $table = 'ev_asistentes';

    public function eventos()
    {
        return $this->belongsTo('App\Model\Eventos\Evento', 'evento_id');
    }

    public function usuarios()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
