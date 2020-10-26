<?php

namespace App\Model\Caracterizacion;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Caracterizacion extends Model implements Searchable
{
    protected $table = 'caracterizacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','dependencia', 'indispensable_presencial','por_que',
        'horaEntrada', 'horaSalida', 'dias_laborales','trabajo_en_casa',
        'viabilidad_caracterizacion', 'observacion_cambios_de_estado',
        'notas_comentarios_ma_andrea_leyva', 'envio_de_carta_autorizacion',
        'envio_de_consentimiento', 'envio'
    ];

    public function getSearchResult(): SearchResult
    {
       $url = route('caracterizacion.show', $this->id);
       return new SearchResult($this, $this->user->name, $url);
    }

    public function user()
    {
      return $this->belongsTo('App\User');

    }
    public function colores(){
      $colorEstado;
      switch ( $this->viabilidad_caracterizacion ) {
        case 'Consultar con jefatura servicio médico y SST':
          $colorEstado = "viabilidad-sst bold";
          break;
        case 'Viable trabajo presencial':
          $colorEstado = "viabilidad-tp bold";
          break;
        case 'Trabajo en casa y consultar a telemedicina':
          $colorEstado = "viabilidad-tele bold";
          break;
        case 'Trabajo en casa':
          $colorEstado = "viabilidad-tec  bold";
          break;
        default:
        case 'Sin clasificación':
          $colorEstado = "viabilidad-sin bold";
          break;
      }
      return $colorEstado;
    }
    public function diasLaborales(){
      return preg_replace("/[^a-zA-Z0-9]+/", " ", $this->dias_laborales);
    }
    public function scopeByUser($query, User $user)
    {
      if($user->rol_id < 3){
        $unidad_usuario = $user->unidad_id;
        return $query->whereHas('user', function($q) use ($unidad_usuario){
          $q->where('unidad_id', $unidad_usuario);
        });
      }
      return $query;
    }

}
