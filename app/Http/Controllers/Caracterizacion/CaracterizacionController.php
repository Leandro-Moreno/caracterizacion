<?php

namespace App\Http\Controllers\Caracterizacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Caracterizacion\Caracterizacion;

class CaracterizacionController extends Controller
{
    public function index(Caracterizacion $model)
    {
        return view('caracterizacion.index', ['datos' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CaracterizacionRequest $request, Caracterizacion $model)
    {
        $model->create(
            [
                'estado' => $request->estado,
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'firma_id' => $request->firma,
                'firma2_id' => $request->firma2,
                'fecha' => $request->fecha,
                'hora' => $request->hora,
            ]
        );

        return redirect()->route('caracterizacion')->withStatus(__('Caracterizacion creado con éxito.'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Eventos\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento, Firma $model)
    {
        return view('caracterizacion.edit', compact('evento'), ['firmas' => $model->all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Eventos\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        $evento->nombre = $request->nombre;
        $evento->estado = $request->estado;
        $evento->descripcion = $request->descripcion;
        $evento->firma_id = $request->firma;
        $evento->firma2_id = $request->firma2;
        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
        $evento->save();
        return redirect()->route('caracterizacion')->withStatus(__('Evento actualizado con éxito.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Eventos\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        echo "En construcción";
    }
}