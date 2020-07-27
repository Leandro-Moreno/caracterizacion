<?php

namespace App\Http\Controllers\Eventos;

use PDF;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Model\Eventos\Evento;
use App\Model\Eventos\Asistente;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Asistente $asistente)
    {

        return view('certificados.index', ['datos' => $asistente->where('user_id',Auth::id())->get()]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publico()
    {
        return view('certificados.publico');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validar(Request $request)
    {
        $this->Validate($request, [
            'referencia' => 'required',
            'documento' => 'required'
            ]);
        $referencia = $request->referencia;
        if (strlen($referencia) == 8) {
            $referencia = substr($referencia, 2);
            $referencia = (int)$referencia;
            $certificado = Asistente::where('asistencia', $referencia)->first();
            if ($certificado) {
                if ($request->documento == $certificado->usuarios->documento) {
                    return redirect('certificados/publico')->withStatus(__("El certificado $request->referencia le pertenece al Documento $request->documento"));
                }
                return redirect('certificados/publico')->with('error', 'NO se encuentra el certificado');
            } else {
                return redirect('certificados/publico')->with('error', 'NO se encuentra el certificado');
            }
        } else {
            return redirect('certificados/publico')->with('error', 'El número de referencia no es correcto');
        }
    }

    public function pdf($evento, $user)
    {
        $usuario = User::find($user);
        $evento  = Evento::find($evento);
        $asistencia = Asistente::where('user_id', $user)->where('evento_id', $evento->id)->first();

        if (!$usuario) {
            return redirect()->route('certificados')->with('error', '!Usuario no existe!');
        }

        if (!$evento) {
            return redirect()->route('certificados')->with('error', '!Evento no existe!');
        }

        if (!$asistencia) {
            return redirect()->route('certificados')->with('error', '!No asistió al evento!');
        }

        $fecha  = Date::createFromFormat('Y-m-d', $evento->fecha, 'America/Bogota');
        $resultado = $fecha->format('j \d\e F \d\e Y');
        $imagen = "storage/firmas/".$evento->firma->imagen;
        $imagen2 = "storage/firmas/".$evento->firma2->imagen;

        if (Auth::user()->rol_id <= 2) {
            $pdf = PDF::loadView(
                'certificados.pdf',
                ['asistencia' => $asistencia,
              'fechaEvento'=> $resultado,
              'imagen'  => $imagen,
              'imagen2'  => $imagen2]
            )
            ->setPaper('letter', 'landscape');
            return $pdf->download('certificado.pdf');
        }
        if (Auth::user()->rol_id == 3) {
            if (Auth::user()->id == $usuario->id) {
                $pdf = PDF::loadView(
                    'certificados.pdf',
                    ['asistencia' => $asistencia,
                  'fechaEvento'=> $resultado,
                  'imagen'  => $imagen,
                  'imagen2'  => $imagen2]
                )
                    ->setPaper('letter', 'landscape');
                return $pdf->stream('certificado.pdf');
            }

            return redirect()->route('certificados')->with('error', '¿Está perdido?');
        }
    }
}
