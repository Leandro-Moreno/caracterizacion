<?php

namespace App\Exports;

use App\Model\Caracterizacion\Caracterizacion;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class CaracterizacionExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $viabilidades;

    public function __construct($viabilidades)
    {
       $this->viabilidades = $viabilidades;
    }
    public function view(): View
    {
        return view('reporte.excel',[
            'viabilidades' => $this->viabilidades
        ]);
    }
    public function collection()
    {
        return $this->viabilidades;
    }
}
