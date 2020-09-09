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
use App\Model\Estado;
use App\Rol;
use App\Imports\UsersImport;//TODO: cambiar users por caracterizacion
use Maatwebsite\Excel\Facades\Excel;


use Spatie\Searchable\Search;

class CaracterizacionController extends Controller
{
    public function __construct()
    {
       $this->authorizeResource(Caracterizacion::class);

    }

    /**
     * @param Request $request
     * @return \Illuminate\http\Response
     */
    public function index(Request $request)
    {
        $unidades = Unidad::all();
        $roles = Rol::all();
        $viabilidad_obtenida = $request->get('viabilidad');
        $unidad_obtenida = $request->get('unidad');
        $rol_obtenido = $request->get('rol');
        $estado_obtenido = $request->get('estado');
        $caracterizaciones = $this->busquedaAvanzada($request);
        $caracterizaciones = $this->agregarColorEstado($caracterizaciones);
        if(Auth::user()->rol_id < 3){
          $caracterizaciones = $caracterizaciones->filter(function ($caracterizacion){
              $user = Auth::user();
              return $caracterizacion->user->unidad_id == $user->unidad_id;
          });
          $unidades = Unidad::where( 'id','=', Auth::user()->unidad_id )->get();
          $roles = Rol::where( 'id', Auth::user()->rol_id )->get();
        }
        foreach($caracterizaciones as $caracterizacion){
          $caracterizacion->dias_laborales = preg_replace("/[^a-zA-Z0-9]+/", " ", $caracterizacion->dias_laborales);
        }
        $caracterizaciones = $caracterizaciones->paginate(15);
        $estados = Estado::all();
        return view('caracterizacion.index', compact('estados', 'roles', 'unidades','unidad_obtenida', 'estado_obtenido' , 'rol_obtenido' , 'viabilidad_obtenida', 'caracterizaciones') );
    }

    public function busquedaAvanzada($request){

      if( null !==  $request ){

          if (Auth::user()->rol_id >= 2){
            $viabilidad_obtenida = $request->get('viabilidad');
            $unidad_obtenida = $request->get('unidad');
            $rol_obtenido = $request->get('rol');
            $estado_obtenido = $request->get('estado');
            $envio_carta  = $request->get('envioCarta');
            $indispensable_obtenida = $request->get('indispensable');
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
            if($envio_carta != ""){
              $caracterizacion = $caracterizacion->where('envio_de_carta_autorizacion', '=', $envio_carta);
            }
            if($indispensable_obtenida != ""){
              $caracterizacion = $caracterizacion->where('indispensable_presencial', '=', $indispensable_obtenida);
            }
            $caracterizacion = $caracterizacion->get();
        }
      }
      else{
        $caracterizacion = Caracterizacion::all();
      }

        return $caracterizacion;
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


    /**
     * @param Caracterizacion|Collection[] $caracterizaciones
     * @return Caracterizacion|Collection[]
     */
    public function agregarColorEstado($caracterizaciones )
    {
      $caracterizaciones = $caracterizaciones->each(function($caracterizacion, $key){
        switch ( $caracterizacion->viabilidad_caracterizacion ) {
          case 'Consultar con jefatura servicio médico y SST':
            $caracterizacion->estadoColor = "viabilidad-sst bold";
            break;
          case 'Viable trabajo presencial':
            $caracterizacion->estadoColor = "viabilidad-tp bold";
            break;
          case 'Trabajo en casa y consultar a telemedicina':
            $caracterizacion->estadoColor = "viabilidad-tele bold";
            break;
          case 'Trabajo en casa':
            $caracterizacion->estadoColor = "viabilidad-tec  bold";
            break;
          case 'Sin clasificación':
            $caracterizacion->estadoColor = "viabilidad-sin bold";
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

        }
        if(!is_null($request->dias_laborales )){
          $request->dias_laborales = json_encode($request->dias_laborales);
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
        $user->barrio = $request->barrio ;
        $user->localidad = $request->localidad;
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
        $caracterizacion->id = $user->id ;
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
    public function edit(Caracterizacion $caracterizacion)
    {
      $unidades = Unidad::all();
      $user = $caracterizacion->user;
      $viabilidades = array("Consultar con jefatura servicio médico y SST", "Viable trabajo presencial", "Trabajo en casa y consultar a telemedicina", "Trabajo en casa", "Sin clasificación");
      $semana_laboral = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
      $dias_laborales = json_decode($caracterizacion->dias_laborales);
      return view('caracterizacion.edit', compact('viabilidades','caracterizacion', 'unidades', 'user', 'dias_laborales', 'semana_laboral'));
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
      if (Auth::user()->rol_id == 2){
        $validatedData = $request->validate([
          'email' => 'required|email|max:255',
          'documento' => 'required|numeric',
      ]);

    }
        $datos = $request->all();
        if(!is_null($datos['dias_laborales']) ){
          $datos['dias_laborales'] = json_encode($request->dias_laborales);
        }
        if(!isset( $datos['indispensable_presencial'] )){
            $datos['indispensable_presencial'] = 'No' ;
        }
        if(!isset($datos['trabajo_en_casa'] )){
            $datos['trabajo_en_casa'] = 'No' ;
        }
        if(!isset($datos['envio_de_carta_autorizacion'] )){
            $datos['envio_de_carta_autorizacion'] = 'No' ;
        }
        if(!isset($datos['envio_de_consentimiento'] )){
            $datos['envio_de_consentimiento'] = 'No' ;
        }
        $user = $caracterizacion->user()->first();
        $user->fill($datos);
        $user->save();
        $caracterizacion->fill($datos);
        $caracterizacion->save();
        return redirect('caracterizacion')->with('status', 'Caracterización actualizada con éxito.');
    }
    /**
     * Import the specified resource from storage.
     *
     * @param  \App\Model\Caracterizacion\Caracterizacion  $caracterizacion
     * @return \Illuminate\Http\Response
     */
    public function importar(){
      return view('caracterizacion.import');
    }
        /**
     * Import the specified resource from storage.
     *
     * @param  \App\Model\Caracterizacion\Caracterizacion  $caracterizacion
     * @return \Illuminate\Http\Response
     */
    public function importarCrear(){
      $import = new UsersImport;
      Excel::import($import, request()->file('caracterizacion') );
      $cifras=$import->getRowCount();
      return back()->with('alert','El proceso de importación fue exitoso. Se crearon '
      .$cifras[2].' y se actualizaron '
      .$cifras[3].' empleados. Además se crearon '
      .$cifras[0].' y se actualizaron '
      .$cifras[1].' caracterizaciones.');
    }
        /**
     * Advanced Search the specified resource from storage.
     *
     * @param  \App\Model\Caracterizacion\Caracterizacion  $caracterizacion
     * @return \Illuminate\Http\Response
     */
    public function busqueda(Request $request)
    {
      $results = (new Search())
              ->registerModel(User::class, ['name','documento','email'])
              ->search($request->input('query'));
      return response()->json($results);
    }
}
