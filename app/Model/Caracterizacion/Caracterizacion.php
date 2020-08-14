<?php

namespace App\Model\Caracterizacion;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

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
        'user_id','dependencia', 'indispensable_presencial','por_que', 'horaEntrada', 'horaSalida', 'dias_laborales','trabajo_en_casa', 'viabilidad_caracterizacion', 'observacion_cambios_de_estado', 'notas_comentarios_ma_andrea_leyva', 'envio_de_consentimiento', 'envio'
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
    public function scopeBuscarpor($query, $unidad, $role, $estado) {
    	if ( ($unidad) && ($role) && ($estado) ) {
        dd($query, $unidad);
    		return $query->where($tipo,'like',"%$buscar%");
    	}
    }
    public function colores(){
      $colorEstado;
      switch ( $this->viabilidad_caracterizacion ) {
        case 'Consultar con jefatura servicio médico y SST':
          $colorEstado = "warning";
          break;
        case 'Viable trabajo presencial':
          $colorEstado = "success";
          break;
        case 'Trabajo en casa y consultar a telemedicina':
          $colorEstado = "danger";
          break;
        case 'Sin clasificación':
          $colorEstado = "black";
          break;
        default:
          break;
      }
      return $colorEstado;
    }
}
