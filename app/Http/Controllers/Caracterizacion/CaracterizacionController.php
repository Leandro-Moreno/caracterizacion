<?php

namespace App\Http\Controllers\Caracterizacion;

use App\User;
use App\Rol;
use App\Model\Estado;
use App\Model\Caracterizacion\Unidad;
use App\Model\Caracterizacion\Caracterizacion;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use App\Notifications\EstadoSaludModificado;
use App\Imports\UsersImport;//TODO: cambiar users por caracterizacion
use App\Http\Controllers\Controller;

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
    public function index()
    {
        $user = Auth::user();
        $caracterizaciones = Caracterizacion::byUser($user)->paginate(15);
        $estados = Estado::all();
        $listado_dependencias = $this->listadoDependencias($caracterizaciones);
        switch ($user->rol_id) {
          default:
          case 1:
          case 2:
            $unidades = Unidad::where( 'id','=', Auth::user()->unidad_id )->get();
            $roles = Rol::where( 'id', Auth::user()->rol_id )->get();
            break;
          case 3:
          case 4:
          case 5:
            $unidades = Unidad::all();
            $roles = Rol::all();
          break;
        }
        return view('caracterizacion.index', compact('listado_dependencias','estados', 'roles', 'unidades', 'caracterizaciones') );
    }
    public function listadoDependencias($caracterizaciones)
    {
      return $caracterizaciones->load('user')->unique('dependencia')->pluck('dependencia')->toArray();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Caracterizacion $model )
    {
      if (Auth::user()->rol_id == 2){
        $validatedData = $request->validate([
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
    public function ajustarHoras(String $hora)
    {
        $temporal = explode(':', $hora);
        if(!isset($temporal[2])){
          return $hora . ":00";
        }
        else {
          return $hora;
        }
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
        $datos = $request->all();
        if(isset($datos['dias_laborales']) ){
          $datos['dias_laborales'] = json_encode($request->dias_laborales);
        }
        if(!isset( $datos['indispensable_presencial'] )){
            $datos['indispensable_presencial'] = 'No' ;
        }
        else {
          $datos['horaEntrada'] = $this->ajustarHoras($datos['horaEntrada']);
          $datos['horaSalida'] = $this->ajustarHoras($datos['horaSalida']);
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
        if(isset($datos['viabilidad_caracterizacion']))
        {
          $this->notificarCambiosSalud($user, $datos['viabilidad_caracterizacion']);
        }
        return redirect('caracterizacion')->with('status', 'Caracterización actualizada con éxito.');
    }
    public function notificarCambiosSalud(User $empleado, String $cambios = "")
    {
      $usuarios_facultad = User::where('rol_id',2)->where('unidad_id',$empleado->unidad_id)->get();
      foreach ($usuarios_facultad as $usuario_a_notificar) {
        $usuario_a_notificar->notify( new EstadoSaludModificado( $empleado, $cambios ) );
      }
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
    public function avanzada(Request $request){
      $user = Auth::user();
      $request = $request->all();
      $datos = array_filter(  $request );
      $caracterizaciones = $this->busquedaAvanzada($datos)->paginate(15);
      $estados = Estado::all();
      $listado_dependencias = $this->listadoDependencias(Caracterizacion::byUser($user)->get('dependencia'));
      switch ($user->rol_id) {
        default:
        case 1:
        case 2:
          $unidades = Unidad::where( 'id','=', Auth::user()->unidad_id )->get();
          $roles = Rol::where( 'id', Auth::user()->rol_id )->get();
          break;
        case 3:
        case 4:
        case 5:
          $unidades = Unidad::all();
          $roles = Rol::all();
        break;
      }

      return view('caracterizacion.index-busqueda', compact('listado_dependencias','estados', 'roles', 'unidades', 'caracterizaciones', 'request') );
    }
    public function busquedaAvanzada(Array $datos){
      $user = Auth::user();
      $caracterizacion = Caracterizacion::byUser($user);
      foreach ($datos as $key => $value) {
        switch ($key) {
          case 'viabilidad':
            $caracterizacion = $caracterizacion->where('viabilidad_caracterizacion', $value);
            break;
          case 'filtroDependencia':
            $caracterizacion = $caracterizacion->where('dependencia', $value);
            break;
          case 'unidad':
            $caracterizacion = $caracterizacion->whereHas('user', function($q) use($value){
              return $q->where('unidad_id', $value);
            });
            break;
          case 'rol':
            $caracterizacion = $caracterizacion->whereHas('user', function($q) use($value){
              return $q->where('rol_id', $value);
            });
            break;
          case 'estado':
            $caracterizacion->whereHas('user', function($q) use($value){
              return $q->where('estado_id', $value);
            });
            break;
          case 'envioCarta':
            $caracterizacion = $caracterizacion->where('envio_de_carta_autorizacion', $value);
            break;
          case 'indispensable':
            $caracterizacion = $caracterizacion->where('indispensable_presencial', $value);
            break;
        }
      }
      return $caracterizacion;
    }
}
