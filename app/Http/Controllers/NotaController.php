<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\Nota;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notas = Alumno::orderBy('id', 'asc')->paginate(25);
        return view('nota.listar_nota', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $grados = Grado::all(); // Obtener todos los grados desde la base de datos
        $sucursales = Sucursal::all(); // Obtener todos las sucursales desde la base de datos
        $cursos = Curso::all(); // Obtener todos las sucursales desde la base de datos
        $alumnos = Alumno::find($id);

        return view("nota.modificar_nota", compact('alumnos', 'grados', 'sucursales', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $notas = Alumno::find($id);

        $notas->id = $request->post('id');
        $notas->nombre = $request->post('nombre');
        $notas->apellido = $request->post('apellido');
        $notas->sucursal_id = $request->post('sucursal_id');
        $notas->grado_id = $request->post('grado_id');
        $notas->curso1_id = $request->post('curso1_id');
        $notas->curso2_id = $request->post('curso2_id');

        $notas->fecha_registro = $request->post('fecha_registro');


        $notas->save();

        return redirect()->route("alumno.index2")->with("success", "Actualizado con exito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
