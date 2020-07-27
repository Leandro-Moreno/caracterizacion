<?php

namespace App\Http\Controllers\Eventos;

use Illuminate\Http\File;
use App\Model\Eventos\Firma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

/**
 * FirmaController Class Doc Comment
 *
 * @category Controllers
 * @package  FirmaController
 * @author   JorgePeralta
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.dsit.uniandes.edu.co/
 *
 */
class FirmaController extends Controller
{
        /**
         * Muestra todas las firmas.
         *
         * @param  \App\Model\Eventos\Firma  $model
         * @return \Illuminate\View\firmas\index
         */
    public function index(Firma $model)
    {
        return view('firmas.index', ['datos' => $model->paginate(15)]);
    }

    /**
     * Muestra el formulario para crear firmas.
     *
     * @return \Illuminate\View\firmas\create
     */
    public function create()
    {
        return view('firmas.create');
    }


        /**
         * Almacena las firmas
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Model\Eventos\Firma  $model
         * @return mixed
         */
    public function store(Request $request, Firma $model)
    {
        $nombreImagen = $request->file('imagen')->getClientOriginalName();
        $nombreImagen = \Str::random(3).$nombreImagen;
        $model->create(
            [
                'nombre' => $request->nombre,
                'area' => $request->area,
                'cargo' => $request->cargo,
                'imagen' => $nombreImagen,
            ]
        );

        Storage::putFileAs('public/firmas', new File($request->imagen), $nombreImagen);

        return redirect()->route('firmas')->withStatus(__('Firma creada con éxito.'));
    }


    /**
     * Muestra el formulario para editar las firmas.
     *
     * @param  \App\Model\Eventos\Firma  $firma
     * @return \Illuminate\View\firmas\edit
     */
    public function edit(Firma $firma)
    {
        return view('firmas.edit', compact('firma'));
    }

    /**
     * Actualiza la firma en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Eventos\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Firma $firma)
    {
        $firma->nombre = $request->nombre;
        $firma->area = $request->area;
        $firma->cargo  = $request->cargo;

        if ($request->imagen) {
            $nombreImagen = $request->file('imagen')->getClientOriginalName();
            $nombreImagen = \Str::random(3).$nombreImagen;
            $firma->imagen = $nombreImagen;
            Storage::putFileAs('public/firmas', new File($request->imagen), $nombreImagen);
        }

        $firma->save();
        return redirect()->route('firmas')->withStatus(__('Evento actualizado con éxito.'));
    }

    /**
     * Elimina la firma.
     *
     * @param  \App\Model\Eventos\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Firma $firma)
    {
        //
    }
}
