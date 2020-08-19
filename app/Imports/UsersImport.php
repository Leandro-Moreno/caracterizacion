<?php

namespace App\Imports;

use App\User;
use App\Model\Caracterizacion\Unidad;
use App\Model\Caracterizacion\Caracterizacion;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        $usuario = $this->userRow(  $row );

        $caracterizacion = $usuario->caracterizacion;

        if( is_null(  $caracterizacion ) )
        {
          $caracterizacion  = new Caracterizacion([
            'user_id' => $usuario->id
          ]);
        }
        $caracterizacion->indispensable_presencial =  isset(  $row['por_responsabilidades_es_indispensable_su_trabajo_presencial']  ) ? $row['por_responsabilidades_es_indispensable_su_trabajo_presencial'] : '';

        $caracterizacion->por_que =  isset(  $row['por_que']  ) ? $row['por_que'] : '';
        $caracterizacion->horaEntrada =  isset(  $row['hora_de_entrada'] ) ? $row['hora_de_entrada']* 2400 : 0;
        $caracterizacion->horaSalida =  isset(  $row['hora_de_salida'] ) ? $row['hora_de_salida']* 2400 : 0;
        $caracterizacion->trabajo_en_casa =  isset(  $row['trabajo_en_casa']  ) ? $row['trabajo_en_casa'] : '';
        $caracterizacion->dias_laborales =  isset(  $row['dias_laborales']  ) ? $row['dias_laborales'] : '';
        $caracterizacion->viabilidad_caracterizacion =  isset(  $row['viabilidad_por_caracterizacion']  ) ? $row['viabilidad_por_caracterizacion'] : '';
        $caracterizacion->observacion_cambios_de_estado =  isset(  $row['observacion_cambios_de_estado']  ) ? $row['observacion_cambios_de_estado'] : '';
        $caracterizacion->notas_comentarios_ma_andrea_leyva =  isset(  $row['notas_comentarios_ma_andrea_leyva']  ) ? $row['notas_comentarios_ma_andrea_leyva'] : '';
        $caracterizacion->envio_de_consentimiento =  isset(  $row['envio_de_consentimiento']  ) ? $row['envio_de_consentimiento'] : '';

        return $caracterizacion;

    }
    public function userRow (array $row)
    {
      $usuario = User::where('email', $row['correo_electronico'])->first();

      if (  ! $usuario  ) {
        $unidad = Unidad::where('nombre_unidad',$row['facultad'])->first();
        $usuario  = new User([
            'rol_id'   => 1,
            'name' => isset(  $row['nombre']  ) ? $row['nombre'] : '',
            'apellido' => isset( $row['apellido']  )? $row['apellido']  : '',
            'email' => $row['correo_electronico'],
            'tipo_doc' => isset(  $row['tipo_de_identificacion']  ) ? $row['tipo_de_identificacion'] : '',
            'documento' => isset(  $row['no_identificacion']  ) ? $row['no_identificacion'] : 0,
            'dependencia' => isset(  $row['dependencia']  ) ? $row['dependencia'] : '',
            'cargo' => isset(  $row['cargo']  ) ? $row['cargo'] : '',
            'celular' => isset(  $row['celular']  ) ? $row['celular'] : 0,
            'direccion' => isset(  $row['direccion_actual']  ) ? $row['direccion_actual'] : '',
            'tipo_contrato' => isset(  $row['tipo_de_contrato']  ) ? $row['tipo_de_contrato'] : '',
            'barrio' => isset(  $row['barrio']  ) ? $row['barrio'] : '',
            'localidad' => isset(  $row['localidad']  ) ? $row['localidad'] : '',
            'unidad_id' => $unidad->id,
            'password' => ''
        ]);
      }
      $usuario->save();
      return $usuario;
    }
    public function validaContenidoVacio( $campo  ){
      return isset( $campo  )  ? $campo  : '';
    }

    public function rules(): array
    {
        return [

            '*.correo_electronico' => ['required', 'email'],

            /*
            '*.0' => [ 'required', 'email', function($attribute, $value, $onFailure) {

                $usuario = User::where('email',$value)->first();

                if ($usuario) {
                   $onFailure('El correo '.$value.' ya se encuentra ingresado');
                }
            }],
            */

        ];
    }
}
