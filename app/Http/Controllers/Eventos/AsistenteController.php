<?php

namespace App\Http\Controllers\Eventos;

use App\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Model\Eventos\Evento;
use App\Model\Eventos\Asistente;
use App\Exports\AsistentesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Illuminate\Notifications\Notifiable;
use App\Notifications\UsuarioNuevo;

class AsistenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Evento $model)
    {
        return view('asistentes.index', ['datos' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Evento $eventos)
    {
        return view('asistentes.create', ['eventos' => $eventos->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validate($request, [
            'evento' => 'required|',
            'asistentes' => 'mimes:xlsx',
        ]);

        Excel::import(new UsersImport, $request->asistentes);
        $asistentes = (new UsersImport)->toArray($request->asistentes);

        for ($i = 0; $i < count($asistentes[0]); $i++) {
            $email = $asistentes[0][$i]['correo_electronico'];

            $user = User::where('email', $email)->first();

            $noValido = Asistente::where('user_id', $user->id)->where('evento_id', $request->evento)->first();
            $serial = Asistente::max('id');

            if (!$noValido) {
                $asistencias = new Asistente;
                $asistencias->evento_id = $request->evento;
                $asistencias->user_id = $user->id;
                if (is_null($serial)) {
                    $asistencias->asistencia = 1;
                } else {
                    $asistencias->asistencia = $serial+1;
                }
                $asistencias->save();
                //$user->notify(new UsuarioNuevo());
            }
        }

        return redirect()->route('asistentes')->withStatus(__('Asistentes agregados correctamente.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Eventos\Asistente  $asistente
     * @return \Illuminate\Http\Response
     */
    public function show($id, Evento $evento)
    {
        $asistentes = Asistente::where('evento_id', $id)->get();
        $evento = $evento->find($id);
        return view('asistentes.show', compact('evento'), ['datos' => $asistentes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Eventos\Asistente  $asistente
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistente $asistente)
    {
        //
    }


    public function descargar($id)
    {
        return Excel::download(new AsistentesExport($id), 'asistentes_'.$id.'.xlsx');
    }


    public function addAsistente($id, Request $request)
    {
        $this->Validate($request, [
            'email' => 'required|'
        ]);
        $usuario = new User;
        $usuario->name              = $request->name;
        $usuario->name2             = $request->name2;
        $usuario->apellido          = $request->apellido;
        $usuario->apellido2         = $request->apellido2;
        $usuario->email             = $request->email;
        $usuario->tipo_doc          = $request->tipo_doc;
        $usuario->documento         = $request->documento;
        $usuario->profesion         = $request->profesion;
        $usuario->cargo             = $request->cargo;
        $usuario->celular           = $request->celular;
        $usuario->direccion         = $request->direccion;
        $usuario->medio             = $request->medio;
        $usuario->tipo_persona      = $request->tipo_persona;
        $usuario->asistencia_minima = $request->asistencia_minima;
        $usuario->uso_datos         = 1;
        $usuario->rol_id            = 3;
        $usuario->password          = '0';

        $usuario->save();

        $serial = Asistente::max('id');

        $asistencias = new Asistente;
        $asistencias->evento_id = $id;
        $asistencias->user_id = $usuario->id;
        if (is_null($serial)) {
            $asistencias->asistencia = 1;
        } else {
            $asistencias->asistencia = $serial+1;
        }
        $asistencias->save();

        return redirect('asistentes/'.$id)->withStatus(__('Asistentes agregados correctamente.'));
    }

    public function addAsistenteExistente($id, Request $request)
    {
        $this->Validate($request, [
            'usuario' => 'required|'
        ]);

        $user = User::find($request->usuario);
        $noValido = Asistente::where('user_id', $user->id)->where('evento_id', $id)->first();
        $serial = Asistente::max('id');

        if (!$noValido) {
            $asistencias = new Asistente;
            $asistencias->evento_id = $id;
            $asistencias->user_id = $request->usuario;
            if (is_null($serial)) {
                $asistencias->asistencia = 1;
            } else {
                $asistencias->asistencia = $serial+1;
            }
            $asistencias->save();
        } else {
            return redirect('asistentes/'.$id)->withStatus(__('Ya se agregó con anterioridad al evento'));
        }

        return redirect('asistentes/'.$id)->withStatus(__('Asistentes agregados correctamente.'));
    }

    public function findAsistente(Request $request)
    {
        $usuario = User::where('email','like', '%'.$request->correo.'%')->first();
        if ($usuario) {
          // dd($usuario);
            return response()->json($usuario);
        } else {
            return response()->json(['respuesta' => 0]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Eventos\Asistente  $asistente
     * @return \Illuminate\Http\Response
     */
    public function Enviocertificados($id)
    {
        $asistencias = Asistente::where('evento_id', $id)->get();
        foreach ($asistencias as $asistencia) {
          $nombre = $asistencia->usuarios->name . " " . $asistencia->usuarios->name2;
            $asistencia->usuarios->notify(new UsuarioNuevo($nombre));
        }
        return redirect()->route('asistentes')->withStatus(__('Mensajes enviados con éxito.'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Eventos\Asistente  $asistente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistente $asistente)
    {
        $asistente->delete();
        return redirect()->route('asistentes')->withStatus(__('Usuario eliminado con éxito.'));
    }
}
