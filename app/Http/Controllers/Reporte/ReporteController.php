<?php

namespace App\Http\Controllers\Reporte;

use App\Model\Reporte\Reporte;
use Illuminate\Http\Request;
use App\Model\Caracterizacion\Caracterizacion;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Estado;
use App\Rol;
use App\Model\Caracterizacion\Unidad;
use Illuminate\Support\Facades\DB;


class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $viabilidad_obtenida = $request->get('viabilidad');
        $viabilidades = array("Consultar con jefatura servicio médico y SST", "Viable trabajo presencial", "Trabajo en casa y consultar a telemedicina", "Trabajo en casa", "Sin clasificación");
        $unidad_obtenida = $request->get('unidad');
        $rol_obtenido = $request->get('rol');
        $estado_obtenido = $request->get('estado');
        $unidades = Unidad::all();
        $roles = Rol::all();
        $user = Auth::user();
        $estados = Estado::all();
        $caracterizaciones = $this->busquedaAvanzada($request);
        $caracterizaciones = $this->agregarColorEstado($caracterizaciones);
        if($user->rol_id == 2){
          $caracterizaciones  = $caracterizaciones->filter(function ($caracterizacion, $key){
            $user = Auth::user();
            return $caracterizacion->user->unidad_id == $user->unidad_id;
          });
          $unidades = Unidad::where( 'id','=', Auth::user()->unidad_id )->get();
          $roles = Rol::where( 'id','=', Auth::user()->rol_id )->get();
        }
        $caracterizaciones = $caracterizaciones->paginate(10);
        return view('reporte.index', compact('viabilidades','roles','unidades', 'estados' ,'unidad_obtenida', 'estado_obtenido' , 'rol_obtenido' , 'viabilidad_obtenida'), ['caracterizaciones' => $caracterizaciones->paginate(15)]);
    }
    /**
     * @param Caracterizacion|Collection[] $caracterizaciones
     * @return Caracterizacion|Collection[]
     */
    public function agregarColorEstado($caracterizaciones )
    {
      $caracterizaciones = $caracterizaciones->each(function($caracterizacion, $key){
        switch ( $caracterizacion->viabilidad_caracterizacion ) {
          case 'Consultar con jefatura servicio médico y SST':
            $caracterizacion->estadoColor = "viabilidad-sst";
            break;
          case 'Viable trabajo presencial':
            $caracterizacion->estadoColor = "viabilidad-tp";
            break;
          case 'Trabajo en casa y consultar a telemedicina':
            $caracterizacion->estadoColor = "viabilidad-tele";
            break;
          case 'Trabajo en casa':
            $caracterizacion->estadoColor = "viabilidad-tec ";
            break;
          case 'Sin clasificación':
            $caracterizacion->estadoColor = "viabilidad-sin";
            break;
          default:
            break;
        }
        return $caracterizacion;
      });
      return $caracterizaciones;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function busquedaAvanzada($request){

      if( null !==  $request ){
          $viabilidad_obtenida = $request->get('viabilidad');
          $unidad_obtenida = $request->get('unidad');
          $rol_obtenido = $request->get('rol');
          $estado_obtenido = $request->get('estado');
          $caracterizacion = Caracterizacion::first();
          $caracterizacion = $caracterizacion->join('users', 'users.id', '=', 'caracterizacion.user_id');
          if($unidad_obtenida != ""){
              $caracterizacion = $caracterizacion->where('unidad_id', '=', $unidad_obtenida);
          }
          if($rol_obtenido != ""){
              $caracterizacion = $caracterizacion->where('rol_id', '=', $rol_obtenido);

          }
          if($estado_obtenido != ""){
              $caracterizacion = $caracterizacion->where('estado_id', '=', $estado_obtenido);
          }
          if($viabilidad_obtenida != ""){
            $caracterizacion = $caracterizacion->where('viabilidad_caracterizacion', '=', $viabilidad_obtenida);
          }
          $caracterizacion->get();
      }
      else{
        $caracterizacion = Caracterizacion::all();
      }
        $caracterizacion = $this->filtrarDatosPorRol( $caracterizacion  );
        return $caracterizacion->paginate(15);
    }
    public function filtrarDatosPorRol( $caracterizaciones )
    {
      if(Auth::User()->rol_id == 2){
        $caracterizaciones  = $caracterizaciones->filter(function ($caracterizacion, $key){
          $user = Auth::user();
          return $caracterizacion->user->unidad_id == $user->unidad_id;
        });
      }
      return $caracterizaciones;
    }
    /**
     * Display a listing of the resource graph.
     *
     * @return \Illuminate\Http\Response
     */
    public function grafico(Request $request)
    {
        $unidades = Unidad::all();
        $roles = Rol::all();
        $user = Auth::user();
        $estados = Estado::all();
        $unidad_obtenida = $request->get('unidad');
        $rol_obtenido = $request->get('rol');
        $estado_obtenido = $request->get('estado');
        $viabilidad_obtenida = $request->get('viabilidad');
        $viabilidades = Caracterizacion::select('viabilidad_caracterizacion', DB::raw('count(viabilidad_caracterizacion) as viabilidad'))->join('users', 'users.id', '=', 'caracterizacion.user_id');
        if($request->unidad != '')
        {
          $viabilidades = $viabilidades->where('unidad_id','=',$request->unidad);
        }
        if($request->rol != '')
        {
          $viabilidades = $viabilidades->where('rol_id','=',$request->rol);
        }
        if($request->estado != '')
        {
          $viabilidades = $viabilidades->where('estado_id','=',$request->estado);
        }
        $viabilidades = $viabilidades->groupBy('viabilidad_caracterizacion')->get();
        return view('reporte.grafico', compact('viabilidad_obtenida','estado_obtenido','viabilidades','roles','unidades', 'estados','unidad_obtenida','rol_obtenido'));
    }

}
