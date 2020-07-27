<?php

namespace App\Exports;

use App\Model\Eventos\Asistente;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AsistentesExport implements FromView
{
    public function __construct(int $evento)
    {
        $this->evento = $evento;
    }

    public function view(): View
    {
        return view('certificados.excel', [
            'asistentes' => Asistente::where('evento_id', $this->evento)->get()
        ]);
    }
}
