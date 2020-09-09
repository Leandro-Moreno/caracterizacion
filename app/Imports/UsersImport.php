<?php

namespace App\Imports;

use App\User;
use App\Model\Estado;
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
    public $count = 0;
    public function model(array $row)
    {
        ++$this->count;
        $usuario = $this->userRow(  $row );
        $caracterizacion = $usuario->caracterizacion;
        $row['user_id'] = $usuario->id;
        $row['indispensable_presencial'] = isset(  $row['por_responsabilidades_es_indispensable_su_trabajo_presencial']  ) ? $row['por_responsabilidades_es_indispensable_su_trabajo_presencial'] : '';
        $row['dias_laborales'] = isset($row['dias_laborales'])?json_encode($this->diasSemana( $row['dias_laborales'] )):'';
        $row['horaEntrada'] = isset(  $row['hora_de_entrada'] ) ? $row['hora_de_entrada']* 240000 : 0;
        $row['horaSalida'] = isset(  $row['hora_de_salida'] ) ? $row['hora_de_salida']* 240000 : 0;

        $row['viabilidad_caracterizacion'] = $row['viabilidad_por_caracterizacion'];
        if( $caracterizacion )
        {
          $caracterizacion->update($row);
        }
        else {
          $caracterizacion = Caracterizacion::Create($row);
        }
        return $caracterizacion;

    }
    public function userRow (array $row)
    {
      $usuario = User::where('email', $row['correo_electronico'])->first();
      $row['direccion'] = isset($row['direccion_actual'])?$row['direccion_actual']:"";
      $row['tipo_contrato'] = isset($row['tipo_de_contrato'])?$row['tipo_de_contrato']:"";
      if ( isset($row['estado']) ){
         $estado = Estado::where('nombre','like',$row['estado'])->select('id')->first();
         $row['estado_id'] = $estado;
      }
      if (  ! $usuario  ) {
        $unidad = Unidad::where('nombre_unidad',$row['facultad'])->first();
        $row['email'] = $row['correo_electronico'];
        $row['tipo_doc'] = isset($row['tipo_de_identificacion'])?$row['tipo_de_identificacion']:"";
        $row['documento'] = isset($row['no_identificacion'])?$row['no_identificacion']:0;
        $row['name'] = isset($row['nombre'])?$row['nombre']:"";
        $row['unidad_id'] = $unidad->id;
        $row['rol_id'] = 1;
        $row['password'] = "";
        $usuario = User::create( $row );
      }
      else{
        $usuario->save();
      }

      return $usuario;
    }
    public function diasSemana( String $dias_laborales )
    {
      switch ($dias_laborales) {
        case 'lunes a viernes':
          return ["Lunes", "Martes", "Miercoles", "Jueves","Viernes"];
          break;
        case 'lunes a sabado':
          return ["Lunes", "Martes", "Miercoles", "Jueves","Viernes","Sabado"];
          break;
        case 'lunes':
        case 'martes':
        case 'miercoles':
        case 'jueves':
        case 'viernes':
        case 'sabado':
          return array($dias_laborales);
          break;
        default:
          return "";
          break;
      }
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
    public function getRowCount(): int
    {
        return $this->count;
    }
}
