<?php

namespace App\Exports;

use App\Models\Alumno;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AlumnosExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function View() : View
    {
        return view('reporte.exportar_alumnos', ['alumnos' => Alumno::all()]);
    }
}
