<?php

namespace App\Http\Controllers\Caracterizacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Caracterizacion\Caracterizacion;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Model\Caracterizacion\Unidad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Imports\UsersImport;//TODO: cambiar users por caracterizacion
use Maatwebsite\Excel\Facades\Excel;


use Spatie\Searchable\Search;

class CaracterizacionController extends Controller
{
    public function __construct()
    {
       // $this->authorizeResource(Caracterizacion::class);

    }

    public function index(Request $request)
    {
      $unidades = Unidad::all();
      if( null !==  $request->get('estado') ){
        if (Auth::user()->rol_id >= 2){

          $viabilidad_obtenida = $request->get('viabilidad');
          $unidad_obtenida = $request->get('unidad');
          $rol_obtenido = $request->get('rol');
          $estado_obtenido = $request->get('estado');
          $users = User::first();
          if($unidad_obtenida != ""){
              $users = $users->where('unidad_id', '=', $unidad_obtenida);
          }
          if($rol != ""){
              $users = $users->where('rol_id', '=', $rol);

          }
          if($estado != ""){
              $users = $users->where('estado_id', '=', $estado);
          }
          if($viabilidad != ""){
            $users = $users->where('viabiliad_caracterizacion', '=', $viabilidad_obtenida);
        }
          $users = $users->paginate(10);
      }
      }
      else{
        $caracterizaciones = Caracterizacion::all();
      }
      $caracterizaciones = $this->agregarColorEstado($caracterizaciones); //TODO: agregar al modelo como helper
        if(Auth::user()->rol_id < 3){
          $caracterizaciones  = $caracterizaciones->filter(function ($caracterizacion){
            $user = Auth::user();
            return $caracterizacion->user->unidad_id == $user->unidad_id;
          });
        }
        return view('caracterizacion.index', compact('unidades'),  ['caracterizaciones' => $caracterizaciones->paginate(15)] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $user)
    {
        $user_id =array_key_first( $user->request->all() );
        $user = User::where('id','=',$user_id)->first();
        $sendingUser = User::where('rol_id','=',2)->get();
        $unidades = Unidad::all();
        $caracterizacion = new Caracterizacion();
        return view('caracterizacion.create', compact('caracterizacion','user', 'unidades','sendingUser'));
    }

    public function agregarColorEstado( $caracterizaciones )
    {
      $caracterizaciones = $caracterizaciones->each(function($caracterizacion, $key){
        switch ( $caracterizacion->viabilidad_caracterizacion ) {
          case 'Consultar con jefatura servicio médico y SST':
            $caracterizacion->estadoColor = "warning";
            break;
          case 'Viable trabajo presencial':
            $caracterizacion->estadoColor = "success";
            break;
          case 'Trabajo en casa y consultar a telemedicina':
            $caracterizacion->estadoColor = "danger";
            break;
          case 'Sin clasificación':
            $caracterizacion->estadoColor = "black";
            break;
          default:
            break;
        }
        return $caracterizacion;
      });
      return $caracterizaciones;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Caracterizacion $model )
    {
      if (Auth::user()->rol_id == 2){
          $validatedData = $request->validate([
            'email' => 'required|unique:users|max:255',
            'documento' => 'required|unique:users|max:255',
        ]);

        //dd(Auth::user()->rol_id );

      }
        $user = User::Where('email','=',$request->email)->first();

        $user->estado_id = 1;
        $user->name = $request->nombre;
        $user->apellido = $request->apellido;
        $user->tipo_doc = $request->tipo_doc ;
        $user->celular = $request->celular ;
        $user->documento = $request->documento;
        $user->cargo = $request->cargo;
        $user->tipo_contrato = $request->tipo_contrato ;
        $user->direccion = $request->direccion ;
        $user->direccion2 = $request->direccionb.",".$request->direccionl;
        $user->unidad_id = $request->unidad_id ;
        $user->save();

        if($request->indispensable_presencial == null){
            $request->indispensable_presencial = "No";
        }
        if($request->trabajo_en_casa == null){
            $request->trabajo_en_casa = "No";
        }
        if($request->envio_de_consentimiento == null){
            $request->envio_de_consentimiento = "No";
        }
        $caracterizacion = new Caracterizacion;
        $caracterizacion->user_id = $user->id ;
        $caracterizacion->dependencia = $request->dependencia ;
        $caracterizacion->indispensable_presencial = $request->indispensable_presencial ;
        $caracterizacion->por_que = $request->por_que ;
        $caracterizacion->horaEntrada = $request->hora_entrada ;
        $caracterizacion->horaSalida = $request->hora_salida ;
        $caracterizacion->trabajo_en_casa = $request->trabajo_en_casa ;
        $caracterizacion->dias_laborales = $request->dias_laborales ;
        $caracterizacion->viabilidad_caracterizacion = $request->viabilidad_caracterizacion ;
        $caracterizacion->observacion_cambios_de_estado = $request->observacion_cambios_de_estado ;
        $caracterizacion->notas_comentarios_ma_andrea_leyva = $request->notas_comentarios_ma_andrea_leyva ;
        $caracterizacion->envio_de_consentimiento = $request->envio_de_consentimiento ;
        $caracterizacion->save();


        return redirect()->route('caracterizacion')->withStatus(__('Caracterizacion creada con éxito.'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Caracterizacion\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($caracterizacion_id)
    {
      //TODO: revisar parametro de entrada
      $unidades = Unidad::all();
      $sendingUser = User::where('rol_id','=',2)->get();
      $user = User::where('id','=',$caracterizacion_id)->first();
      $caracterizacion = $user->caracterizacion;
      return view('caracterizacion.edit', compact('caracterizacion', 'unidades', 'user' ,'sendingUser'));
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
        if($request->indispensable_presencial == null){
            $request->indispensable_presencial = 'No' ;
        }
        if($request->trabajo_en_casa == null){
            $request->trabajo_en_casa = 'No' ;
        }
        $user = User::where('id','=',$caracterizacion->user_id)->first();
        $user->cargo = $request->cargo;
        $user->direccion = $request->direccion ;
        $user->tipo_contrato = $request->tipo_contrato ;
        $user->direccion2 = $request->direccionb.",".$request->direccionl;
        $user->unidad_id = $request->unidad_id;
        $user->save();

        $caracterizacion->dependencia = $request->dependencia ;
        $caracterizacion->indispensable_presencial = $request->indispensable_presencial ;
        $caracterizacion->por_que = $request->por_que ;
        $caracterizacion->horaEntrada = $request->hora_entrada ;
        $caracterizacion->horaSalida = $request->hora_salida ;
        $caracterizacion->trabajo_en_casa = $request->trabajo_en_casa ;
        $caracterizacion->dias_laborales = $request->dias_laborales ;
        $caracterizacion->viabilidad_caracterizacion = $request->viabilidad_caracterizacion ;
        $caracterizacion->observacion_cambios_de_estado = $request->observacion_cambios_de_estado ;
        $caracterizacion->notas_comentarios_ma_andrea_leyva = $request->notas_comentarios_ma_andrea_leyva ;
        $caracterizacion->envio_de_consentimiento = $request->envio_de_consentimiento ;
        $caracterizacion->save();
        return redirect()->route('caracterizacion')->withStatus(__('Usuario actualizado con éxito.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Caracterizacion\Caracterizacion  $caracterizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caracterizacion $caracterizacion)
    {
        $caracterizacion->delete();
        return redirect()->route('caracterizacion')->withStatus(__('Usuario actualizado con éxito.'));
    }
    public function importar(){
      return view('caracterizacion.import');
    }
    public function importarCrear(){
      $caracterizacion = Excel::import(new UsersImport, request()->file('caracterizacion'));
      // dd($caracterizacion);
      return back();
    }
    public function busqueda(Request $request)
    {
      $results = (new Search())
              ->registerModel(User::class, ['name', 'apellido','documento','email'])
              ->search($request->input('query'));
      return response()->json($results);
    }
}
