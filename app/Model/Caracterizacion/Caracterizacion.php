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
        'user_id','indispensable_presencial','por_que', 'horaEntrada', 'horaSalida', 'dias_laborales','trabajo_en_casa', 'viabilidad_caracterizacion','revision1', 'revision2', 'observacion_cambios_de_estado', 'notas_comentarios_ma_andrea_leyva', 'envio_de_consentimiento', 'envio'
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
}
/*
'user_id'=>$usuario->id,
'indispensable_presencial' => $row['indispensable_presencial'],
'por_que' => $row['por_que'],
'horaEntrada' => $row['hora_de_entrada'],
'horaEntrada' => $row['hora_de_salida'],
'trabajo_en_casa' => $row['trabajo_en_casa'],
'dias_laborales'  =>  $row['dias_laborales'],
'viabilidad_caracterizacion' => $row['viabilidad_caracterizacion'],
'revision1' => isset($row['revision1']) ? $row['revision1'] : '',
'revision2' => isset($row['revision2']) ? $row['revision2'] : '',
'observacion_cambios_de_estado' => $row['observacion_cambios_de_estado'],
'notas_comentarios_ma_andrea_leyva' => $row['notas_comentarios_ma_andrea_leyva'],
'envio_de_consentimiento' => $row['envio_de_consentimiento']*/
