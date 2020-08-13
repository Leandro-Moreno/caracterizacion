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
        $caracterizaciones;
        $caracterizaciones = Caracterizacion::all();
        $user = Auth::user();
        if($user->rol_id < 3){
          $caracterizaciones  = $caracterizaciones->filter(function ($caracterizacion, $key){
            $user = Auth::user();
            return $caracterizacion->user->unidad_id == $user->unidad_id;
          });
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
