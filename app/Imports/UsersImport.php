<?php

namespace App\Imports;

use App\User;
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
      dd($row);
      /*
      "" => 1
 "facultad" => "FACULTAD DE MEDICINA"
 "dependencia" => "FACULTAD DE MEDICINA"
 "cargo" => "INGENIERO"
 "nombre" => "andres"
 "tipo_de_contrato" => "Planta"
 "por_responsabilidades_es_indispensable_su_trabajo_presencial" => "si"
 "por_que" => null
 "hora_de_entrada" => 0.33333333333333
 "hora_de_salida" => 0.5
 "dias_laborales" => "Sábado"
 "trabajo_en_casa" => "NO"
 "viabilidad_por_caracterizacion" => "Consultar con jefatura servicio médico y SST"
 "observacion_cambios_de_estado" => null
 "notas_comentarios_ma_andrea_leyva" => null
 "envio_de_consentimiento" => null
 "correo_electronico" => "correo1@uniandes.edu.co"
 "direccion_acual" => null
 "barrio" => null
 "localidad" => null*/
        $usuario = User::where('email', $row['correo_electronico'])->first();

        if ($usuario) {
            return null;
        }

        return new User([
            'rol_id'   => 3,
            'name' => $row['nombre'],
            'apellido' => $row['apellido'],
            'email' => $row['correo_electronico'],
            'tipo_doc' => $row['tipo_de_identificacion'],
            'documento' => $row['no_identificacion'],
            'profesion' => $row['profesion'],
            'cargo' => $row['cargo'],
            'celular' => $row['telefonos_de_contacto_celular'],
            'direccion' => $row['direccion_de_correspondencia'],
            'medio' => $row['medio_por_el_cual_se_entero'],
            'tipo_persona'=> $row['tipo_de_persona_externoestudiante_uniandes_empleado_uniandes_egresado_uniandes'],
            'uso_datos' => $row['aceptacion_de_uso_de_datos'],
            'asistencia_minima' => $row['cumple_con_asistencia_minima'],
            'password' => 'x'

        ]);
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
