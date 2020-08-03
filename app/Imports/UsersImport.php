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
      // dd($row);

        $usuario = User::where('email', $row['correo_electronico'])->first();

        if (  ! $usuario  ) {
          $unidad = Unidad::where('nombre_unidad',$row['facultad'])->first();
          $usuario  = new User([
              'rol_id'   => 3,
              'name' => $row['nombre'],
              'apellido' => isset($row['apellido'])?$row['apellido']:'',
              'email' => $row['correo_electronico'],
              'tipo_doc' => isset($row['tipo_de_identificacion'])?$row['tipo_de_identificacion']:'',
              'documento' => isset($row['no_identificacion'])?$row['no_identificacion']:0,
              'dependencia' => $row['dependencia'],
              'cargo' => $row['cargo'],
              'celular' => isset($row['celular'])?$row['celular']:'',
              'direccion' => $row['direccion_acual'],
              'tipo_contrato' => $row['tipo_de_contrato'],
              'barrio' => $row['barrio'],
              'localidad' => $row['localidad'],
              'unidad_id' => $unidad->id,
              'password' => 'x'

          ]);
        }
        $usuario->save();
        $caracterizacion  = new Caracterizacion([
          'user_id'=>$usuario->id,
          'indispensable_presencial' => $row['indispensable_presencial'],
          'por_que' => $row['por_que'],
          'horaEntrada' => $row['hora_de_entrada']*2400,
          'horaSalida' => $row['hora_de_salida']*2400,
          'trabajo_en_casa' => $row['trabajo_en_casa'],
          'dias_laborales'  =>  $row['dias_laborales'],
          'viabilidad_caracterizacion' => $row['viabilidad_caracterizacion'],
          'revision1' => isset($row['revision1']) ? $row['revision1'] : '',
          'revision2' => isset($row['revision2']) ? $row['revision2'] : '',
          'observacion_cambios_de_estado' => $row['observacion_cambios_de_estado'],
          'notas_comentarios_ma_andrea_leyva' => $row['notas_comentarios_ma_andrea_leyva'],
          'envio_de_consentimiento' => $row['envio_de_consentimiento']
        ]);
        return $caracterizacion;

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
