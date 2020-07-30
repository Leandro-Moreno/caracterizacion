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
        'user_id','por_responsabilidades_es_indispensable_su_trabajo_presencial','por_que', 'horaEntrada', 'horaSalida', 'dias_laborales','trabajo_en_casa', 'viabilidad_por_caracterizacion','revision1', 'revision2', 'observacion_cambios_de_estado', 'notas_comentarios_ma_andrea_leyva', 'envio_de_consentimiento', 'envio'
    ];
}
/*
'user_id'=>$usuario->id,
'por_responsabilidades_es_indispensable_su_trabajo_presencial' => $row['por_responsabilidades_es_indispensable_su_trabajo_presencial'],
'por_que' => $row['por_que'],
'horaEntrada' => $row['hora_de_entrada'],
'horaEntrada' => $row['hora_de_salida'],
'trabajo_en_casa' => $row['trabajo_en_casa'],
'dias_laborales'  =>  $row['dias_laborales'],
'viabilidad_por_caracterizacion' => $row['viabilidad_por_caracterizacion'],
'revision1' => isset($row['revision1']) ? $row['revision1'] : '',
'revision2' => isset($row['revision2']) ? $row['revision2'] : '',
'observacion_cambios_de_estado' => $row['observacion_cambios_de_estado'],
'notas_comentarios_ma_andrea_leyva' => $row['notas_comentarios_ma_andrea_leyva'],
'envio_de_consentimiento' => $row['envio_de_consentimiento']*/
