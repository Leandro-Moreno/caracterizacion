<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\Caracterizacion\Unidad;
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
       // dd($request);

        $buscar = $request->get('buscarpor');

        $tipo = $request->get('tipo');

        $users = User::buscarpor($tipo, $buscar)->paginate(5);

        $unidades = Unidad::all();
        
        return view('users.index', compact('unidades', 'users'));
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
        $unidad = Unidad::all();
        return view('users.create', compact('unidad'));
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

        //Cambiar la consulta según los estados y roles. COSULTA PRUEBA.
        $userCaracterizacion = User::find($id);
        $user = DB::table('users')
        //->where('users.rol_id', [2,3,4,5,6])
        ->get();
        $sendingUser = User::where('rol_id','=',2)->get();
        $unidades = Unidad::all();
        return view('caracterizacion.createwithuser', compact('user', 'unidades','sendingUser', 'userCaracterizacion'));
    }
    public function storeUser(Request $request)
    {
        $user = new User;
        $user->rol_id = $request->rol;
        $user->name = $request->name;
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
        $unidad = Unidad::all();
        return view('users.edit', compact('user'), ['roles' => $model->all()], ['unidades' => $model->all()]);
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
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except(
                    [$request->get('password') ? '' : 'password']
        )
        );

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
      // $this->authorize('oe');
      $results = (new Search())
    ->registerModel(User::class, ['name', 'apellido','documento','dependencia'])
    ->search($request->input('query'));
    // dd($results);
    return response()->json($results);
    }
}
