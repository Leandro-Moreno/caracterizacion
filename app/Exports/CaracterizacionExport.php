<?php

namespace App\Exports;

use App\Model\Caracterizacion\Caracterizacion;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CaracterizacionExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $caracterizacion;

    public function __construct($caracterizacion)
    {
       $this->caracterizacion = $caracterizacion;
    }
    public function view(): View
    {
        return view('reporte.excel',[
            'caracterizacion' => $this->caracterizacion
        ]);
    }
    public function collection()
    {
        return $this->caracterizacion;
    }
}
