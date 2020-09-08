<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Caracterizacion\Caracterizacion;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $ultimos_usuarios = User::take(20)->get();
        $envio_consentimiento = Caracterizacion::where('envio_de_consentimiento' , '=' , 'No')->get();
        if(Auth::user()->rol_id < 3){
          $envio_consentimiento = $envio_consentimiento->filter(function ($caracterizacion){
              $user = Auth::user();
              return $caracterizacion->user->unidad_id == $user->unidad_id;
          });
          $ultimos_usuarios = $ultimos_usuarios->filter(function ($usuarios){
              $user = Auth::user();
              return $usuarios->unidad_id == $user->unidad_id;
          });
        }
        return view('dashboard', compact('ultimos_usuarios', 'envio_consentimiento'), ['ultimos_usuarios' => $ultimos_usuarios->paginate(3)]);
    }
}
