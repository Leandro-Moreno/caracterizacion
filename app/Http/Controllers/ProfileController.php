<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\Caracterizacion\Unidad;
use App\Rol;
use App\Model\Estado;
use App\User;
use Auth;
/**
 * ProfileController Class Doc Comment
 *
 * @category Controllers
 * @package  ProfileController
 * @author   JorgePeralta
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.dsit.uniandes.edu.co/
 *
 */
class ProfileController extends Controller
{
    /**
     * Muestra el formulario para editar el perfil.
     *
     * @return \Illuminate\View\View
     */


    public function index(Request $request,User $model)
    {

        $buscar = $request->get('buscarpor');

        $tipo = $request->get('tipo');

        $user = Auth::user();
        $users = User::buscarpor($tipo, $buscar)->paginate(10);

        $unidades = Unidad::all();
        return view('profile.index', compact('unidades', 'users', 'user'));
    }


    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Actualiza el perfil
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Cambia la contraseña
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }
}
