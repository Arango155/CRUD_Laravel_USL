<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
//use App\Models\User;
use Illuminate\Http\Request;


class Controller extends BaseController
{

    public function index (){

        return view('home');

}

    public function index2 (Request $request)
    {
        $texto=trim($request->get('texto'));
        $alumnos = Alumno::orderBy('id', 'asc')->select('id','nombre','apellido','sucursal_id','grado_id','curso1_id','curso2_id')
            ->where('sucursal_id','LIKE','%',$texto,'%')
            ->orderBY('sucursal-id','asc')
            ->paginate(10);
        return view('alumno.listar_alumno', compact('alumnos'));

    }

}
