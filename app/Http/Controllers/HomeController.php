<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Caracterizacion\Caracterizacion;

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
        $ultimos_usuarios = User::whereIn('rol_id', [1] )->get();
        $envio_consentimiento = Caracterizacion::where('envio_de_consentimiento' , '=' , 'No')->get();
        return view('dashboard', compact('ultimos_usuarios', 'envio_consentimiento'), ['ultimos_usuarios' => $ultimos_usuarios->paginate(3)]);
    }
}
