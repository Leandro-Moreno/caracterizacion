<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Eventos\Firma;
use App\Model\Eventos\Evento;
use App\Model\Eventos\Asistente;

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

        $eventos =  Evento::orderBy('id','desc')
        ->limit(5)
        ->get();
        $firmas =  Firma::orderBy('id','desc')
        ->limit(5)
        ->get();
        return view('dashboard' ,[
          'eventos' => $eventos,
          'firmas'  =>  $firmas
        ]);
    }
}
