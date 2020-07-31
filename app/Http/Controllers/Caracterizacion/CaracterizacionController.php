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
        $model->create(
            [
                'por_responsabilidades_es_indispensable_su_trabajo_presencial' => $por_responsabilidades_es_indispensable_su_trabajo_presencial,
                'por_que' => $request->por_que,
                'horaEntrada' => $request->horaEntrada,
                'horaSalida' => $request->hora_salida,
                'trabajo_en_casa' => $request->trabajo_en_casa,
                'dias_laborales' => $request->dias_laborales,
                'viabilidad_por_caracterizacion' => $request->viabilidad_por_caracterizacion,
                'revision1' => $request->revision1,
                'revision2' => $request->revision2,
                'observacion_cambios_de_estado' => $request->observacion_cambios_de_estado,
                'notas_comentarios_ma_andrea_leyva' => $request->notas_comentarios_ma_andrea_leyva,
                'envio_de_consentimiento' => $request->envio_de_consentimiento,
            ]

        );
        $user = New User();
        $user->rol_id = 3;
        $user->name = $request->name; 
        $user->apellido = $request->apellido; 
        $user->email = $request->email;
        $user->tipo_doc = $request->tipo_doc ; 
        $user->documento = $request->documento; 
        $user->cargo = $request->cargo; 
        $user->celular = $request->celular; 
        $user->direccion = $request->direccion ; 
        $user->tipo_contrato = $request->tipo_contrato ; 
        $user->direccion2 = $request->barrio.','.$request->localidad; 
        $user->unidad_id = $request->unidad ; 
        $user->password = Hash::make($request->documento); 
        $user->save();

        return redirect()->route('caracterizacion')->withStatus(__('Caracterizacion creada con éxito.'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Caracterizacion\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Caracterizacion $caracterizacion, User $model)
    {
        $unidades = Unidad::all();
        $sendingUser = User::where('rol_id','=',2)->get(); 
        $users = User::all();
        return view('caracterizacion.edit', compact('caracterizacion', 'unidades', 'users' ,'sendingUser'), ['user' => $model->all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Caracterizacion\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caracterizacion $caracterizacion)
    {     
        if($request->por_responsabilidades_es_indispensable_su_trabajo_presencial == null){
            $request->por_responsabilidades_es_indispensable_su_trabajo_presencial = 'No' ;  
        }
        dd($request);
        $caracterizacion->create(
            [
                'por_responsabilidades_es_indispensable_su_trabajo_presencial' => $request->por_responsabilidades_es_indispensable_su_trabajo_presencial,
                'por_que' => $request->por_que,
                
                'horaEntrada' => $request->hora_entrada,
                'horaSalida' => $request->hora_salida,
                'trabajo_en_casa' => $request->trabajo_en_casa,
                'dias_laborales' => $request->dias_laborales,
                'viabilidad_por_caracterizacion' => $request->viabilidad_por_caracterizacion,
                'revision1' => $request->revision1,
                'revision2' => $request->revision2,
                'observacion_cambios_de_estado' => $request->observacion_cambios_de_estado,
                'notas_comentarios_ma_andrea_leyva' => $request->notas_comentarios_ma_andrea_leyva,
                'envio_de_consentimiento' => $request->envio_de_consentimiento,
            ]
           
        );
        $user = New User();
        $user->rol_id = 3;
        $user->name = $request->name; 
        $user->apellido = $request->apellido; 
        $user->email = $request->email;
        $user->tipo_doc = $request->tipo_doc ; 
        $user->documento = $request->documento; 
        $user->cargo = $request->cargo; 
        $user->celular = $request->celular; 
        $user->direccion = $request->direccion ; 
        $user->tipo_contrato = $request->tipo_contrato ; 
        $user->direccion2 = $request->barrio.','.$request->localidad; 
        $user->unidad_id = $request->unidad ; 
        $user->password = Hash::make($request->documento); 
        $user->save();

        return redirect()->route('caracterizacion')->withStatus(__('Usuario actualizado con éxito.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Caracterizacion\Evento  $evento
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
