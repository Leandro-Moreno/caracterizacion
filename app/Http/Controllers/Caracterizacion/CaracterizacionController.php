<?php

namespace App\Http\Controllers\Caracterizacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Caracterizacion\Caracterizacion;
use App\User;
use App\Model\Caracterizacion\Unidad;
use Illuminate\Support\Facades\DB;

use App\Imports\UsersImport;//TODO: cambiar users por caracterizacion
use Maatwebsite\Excel\Facades\Excel;

class CaracterizacionController extends Controller
{
    public function index()
    {
        $caracterizaciones = Caracterizacion::all(); 
        //$caracterizaciones = DB::table('caracterizacion')->paginate(15);
        dd($caracterizaciones);
        return view('caracterizacion.index', compact('caracterizaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Cambiar la consulta según los estados y roles. COSULTA PRUEBA.
        $user = DB::table('users')
        //->where('users.rol_id', [2,3,4,5,6])
        ->get();
        $sendingUser = User::where('rol_id','=',2)->get();    
        $unidades = Unidad::all(); 
        
        
        return view('caracterizacion.create', compact('user', 'unidades','sendingUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Caracterizacion $model )
    {
        
        if ($request->pregunta1 == null){
            $pregunta1 = 0;
        }else{
            $pregunta1 = $request->pregunta1;
        }
        dd($request);
        
        $model->create(
            [
                'pregunta1' => $pregunta1,
                'pregunta2' => $request->pregunta2,
                'horaEntrada' => $request->hora_entrada,
                'horaSalida' => $request->hora_salida,
                'pregunta3' => $request->viabilidad,
                'pregunta4' => $request->viabilidad_caracterizacion,
                'viabilidad' => $request->viabiliadad,
                'revision1' => $request->revision1,
                'revision2' => $request->revision2,
                'observacion' => $request->observacion,
                'notas' => $request->notas,
                'envio' => $request->envio,
            ]

        );
        $user = New User();
        $user->rol_id = 6;
        $user->name = $request->nombre; 
        $user->name = $request->name  ; 
        $user->name2 = $request->name2; 
        $user->apellido = $request->apellido; 
        $user->apellido2 = $request->apellido2 ; 
        $user->email = $request->email;
        $user->tipo_doc = $request->tipo_doc ; 
        $user->documento = $request->documento; 
        $user->cargo = $request->cargo; 
        $user->password = Hash::make($request->documento); 
        $user->tipo_contrato = $request->tipo_contrato ; 
        $user->celular = $request->celular; 
        $user->direccion = $request->direccion ; 
        $user->direccion2 = $request->barrio.','.$request->localidad; 
        $user->unidad_id = $request->unidad ; 
        $user->save();



        return redirect()->route('caracterizacion')->withStatus(__('Caracterizacion creada con éxito.'));
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
    public function importar(){
      return view('caracterizacion.import');
    }
    public function importarCrear(){
      $caracterizacion = Excel::import(new UsersImport, request()->file('caracterizacion'));
      dd($caracterizacion);
      return back();
    }
}
