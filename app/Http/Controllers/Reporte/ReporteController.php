<?php

namespace App\Http\Controllers\Reporte;

use App\Model\Reporte\Reporte;
use Illuminate\Http\Request;
use App\Model\Caracterizacion\Caracterizacion;
use App\Http\Controllers\Controller;
use Auth;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $viable_trabajo_presencial = '|#A9D08E'; //
        $consultar_jefatura_servicio_médico_sst = '|#FFFF99'; //
        $trabajo_casa_consultar_telemedicina = '|#CC99FF'; //
        $trabajo_casa = '|#9BC2E6'; //
        $sin_clasificación = '|#FFFFFF';   //


        $caracterizaciones;
        $caracterizaciones = Caracterizacion::all();
        $user = Auth::user();
        if($user->rol_id < 3){
          $caracterizaciones  = $caracterizaciones->filter(function ($caracterizacion, $key){
            $user = Auth::user();
            foreach ($caracterizaciones as $caracterizacion){
                if($caracterizacion->viabilidad_caracterizacion == 'Consultar con jefatura servicio médico y SST'){
                  $caracterizacion->viabilidad_caracterizacion  = $caracterizacion->viabilidad_caracterizacion.$viable_trabajo_presencial; 
                }
                if($caracterizacion->viabilidad_caracterizacion == 'Viable trabajo presencial'){
                  $caracterizacion->viabilidad_caracterizacion  = $caracterizacion->viabilidad_caracterizacion.$consultar_jefatura_servicio_médico_sst; 
                }
                if($caracterizacion->viabilidad_caracterizacion == 'Trabajo en casa y consultar a telemedicina'){
                  $caracterizacion->viabilidad_caracterizacion  = $caracterizacion->viabilidad_caracterizacion.$trabajo_casa_consultar_telemedicina; 
                }
                if($caracterizacion->viabilidad_caracterizacion == 'Trabajo en casa'){
                  $caracterizacion->viabilidad_caracterizacion  = $caracterizacion->viabilidad_caracterizacion.$trabajo_casa; 
                }
                if($caracterizacion->viabilidad_caracterizacion == 'Sin clasificación'){
                  $caracterizacion->viabilidad_caracterizacion  = $caracterizacion->viabilidad_caracterizacion.$sin_clasificación; 
                }
              }
            return $caracterizacion->user->unidad_id == $user->unidad_id;
          });
        }
        foreach ($caracterizaciones as $caracterizacion){
            if($caracterizacion->viabilidad_caracterizacion == 'Consultar con jefatura servicio médico y SST'){
              $caracterizacion->viabilidad_caracterizacion  = $caracterizacion->viabilidad_caracterizacion.$viable_trabajo_presencial; 
            }
            if($caracterizacion->viabilidad_caracterizacion == 'Viable trabajo presencial'){
              $caracterizacion->viabilidad_caracterizacion  = $caracterizacion->viabilidad_caracterizacion.$consultar_jefatura_servicio_médico_sst; 
            }
            if($caracterizacion->viabilidad_caracterizacion == 'Trabajo en casa y consultar a telemedicina'){
              $caracterizacion->viabilidad_caracterizacion  = $caracterizacion->viabilidad_caracterizacion.$trabajo_casa_consultar_telemedicina; 
            }
            if($caracterizacion->viabilidad_caracterizacion == 'Trabajo en casa'){
              $caracterizacion->viabilidad_caracterizacion  = $caracterizacion->viabilidad_caracterizacion.$trabajo_casa; 
            }
            if($caracterizacion->viabilidad_caracterizacion == 'Sin clasificación'){
              $caracterizacion->viabilidad_caracterizacion  = $caracterizacion->viabilidad_caracterizacion.$sin_clasificación; 
            }
          }

        return view('reporte.index', ['caracterizaciones' => $caracterizaciones->paginate(15)]);
    }

    /**
     * Display a listing of the resource graph.
     *
     * @return \Illuminate\Http\Response
     */
    public function grafico()
    {
        $caracterizaciones;
        $caracterizaciones = Caracterizacion::all();
        $user = Auth::user();
        if($user->rol_id < 3){
          $caracterizaciones  = $caracterizaciones->filter(function ($caracterizacion, $key){
            $user = Auth::user();
            return $caracterizacion->user->unidad_id == $user->unidad_id;
          });
        }

        return view('reporte.grafico', ['caracterizaciones' => $caracterizaciones->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reporte $reporte)
    {
        //
    }
}
