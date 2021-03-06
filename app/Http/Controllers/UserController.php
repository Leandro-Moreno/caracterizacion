<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\Caracterizacion\Unidad;
use App\Model\Estado;
use App\Rol;
use Auth;
use Illuminate\Support\Facades\DB;

use Spatie\Searchable\Search;


class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Request $request,User $model)
    {
        $unidad_obtenida = $request->get('unidad');
        $estado_obtenido = $request->get('estado');
        $rol_obtenido = $request->get('rol');
        $users = $this->busquedaAvanzada($request);
        $unidades = Unidad::all();
        $roles = Rol::all();
        $estados = Estado::all();
        return view('users.index', compact('estados', 'roles', 'unidades', 'users', 'unidad_obtenida', 'estado_obtenido' , 'rol_obtenido'));
    }
    public function busquedaAvanzada($request){

        if (Auth::user()->rol_id >= 2){
            $unidad_obtenida = $request->get('unidad');
            $estado_obtenido = $request->get('estado');
            $rol_obtenido = $request->get('rol');
            $users = User::first();
            if($unidad_obtenida != ""){
                $users = $users->where('unidad_id', '=', $unidad_obtenida);
            }
            if($rol_obtenido != ""){
                $users = $users->where('rol_id', '=', $rol_obtenido);

            }
            if($estado_obtenido != ""){
                $users = $users->where('estado_id', '=', $estado_obtenido);
            }
            $users = $users->paginate(10);
        }
        return $users;
    }

    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function Admin(User $model)
    {
        return view('users.admin', ['users' => $model->whereIn('rol_id',[2,3,4,5])->get()]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $unidades = Unidad::all();
        $roles = Rol::all();
        $estados = Estado::all();
        return view('users.create', compact( 'unidades' , 'estados', 'roles'));
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createCaracterizacion($id)
    {

        if(Auth::user()->rol->id == 2){
            $unidades = Unidad::find(Auth::user()->unidad->id)->get();
        }else{
            $unidades = Unidad::all();
        }
        //Cambiar la consulta según los estados y roles. COSULTA PRUEBA.
        $userCaracterizacion = User::find($id);
        $user = DB::table('users')
        //->where('users.rol_id', [2,3,4,5,6])
        ->get();
        $sendingUser = User::where('rol_id','=',4)->get();
        return view('caracterizacion.createwithuser', compact('user', 'unidades','sendingUser', 'userCaracterizacion'));
    }
    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'documento' => 'required|numeric',
        ]);
        $user = new User;
        if(Auth::user()->rol->id == 2){
            $user->rol_id = 1;
        }
        else{
            $user->rol_id = $request->rol_id;
        }
        $user->estado_id = $request->estado_id;
        $user->name = $request->name;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->tipo_doc = $request->tipo_doc ;
        $user->documento = $request->documento;
        $user->cargo = $request->cargo;
        $user->password = "x";
        $user->tipo_contrato = $request->tipo_contrato ;
        $user->celular = $request->celular;
        $user->direccion = $request->direccion ;
        $user->barrio = $request->barrio;
        $user->localidad = $request->localidad;
        $user->unidad_id = $request->unidad_id;
        $user->save();

        return redirect()->route('user.index')->withStatus(__('Usuario Creado correctamente.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user, Rol $model )
    {
        if(Auth::user()->rol->id == 2){
            $unidades = Unidad::where('unidad_id' , '=' , Auth::user()->unidad->id);
        }else{
            $unidades = Unidad::all();
        }
        $estados = Estado::all();
        return view('users.edit', compact('user', 'unidades', 'estados'), ['roles' => $model->all()]);
    }


    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User  $user)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'documento' => 'required|numeric',
        ]);

        $user->fill(
            $request->merge(['password' => Hash::make($request->get('password'))])
            ->except(
                [$request->get('password') ? '' : 'password']
                )
            );
        if(Auth::user()->rol_id>=4)
        {
          $user->rol_id = $request->get('rol_id');
        }
        $user->save();

        return redirect()->route('user.index')->withStatus(__('Usuario actualizado correctamente.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
    public function importForm( )
    {
        return view('users.imports.create');
    }

    public function busqueda(Request $request)
    {
      $results = (new Search())
    ->registerModel(User::class, ['name','documento','email'])
    ->search($request->input('query'));
      $user = Auth::user();
      if( $user->rol_id == 2){
        $results = $results->filter(function( $value, $key){
          $user = Auth::user();
          return $value->searchable->unidad_id == $user->unidad_id;
        });
      }
      if( $user->rol_id < 5){
        $results = $results->filter(function($user){
          return $user->searchable->estado_id == 1;
        });
      }
    return response()->json($results);
    }
}
