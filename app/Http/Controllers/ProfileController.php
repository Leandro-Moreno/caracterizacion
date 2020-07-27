<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
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
