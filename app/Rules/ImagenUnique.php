<?php

namespace App\Rules;

use App\Model\Eventos\Evento;
use Illuminate\Contracts\Validation\Rule;

class ImagenUnique implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $nombreImagen = $value->getClientOriginalName();
        $imagen = Evento::where('imagen', $nombreImagen)->first();

        if (!is_null($imagen)) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El nombre de la imagen ya existe.';
    }
}
