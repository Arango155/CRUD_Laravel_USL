<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Grado;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cursos = Curso::orderBy('id', 'asc')->paginate(25);
        return view('curso.listar_curso', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $grados = Grado::all();
        return view('curso.agregar_curso', compact('grados'));
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
        $cursos = new Curso();
        $cursos->id = $request->post('id');
        $cursos->nombre = $request->post('nombre');
        $cursos->grado_id = $request->post('grado_id');

        $cursos->save();

        return redirect()->route("curso.index")->with("success", "Agregado con exito!");
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
        $cursos = Curso::find($id);
        return view('curso.eliminar_curso', compact('cursos'));
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
        $grados = Grado::all();
        $cursos = Curso::find($id);
        return view('curso.actualizar_curso', compact('cursos', 'grados'));
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
        $cursos = Curso::find($id);
        $cursos->id = $request->post('id');
        $cursos->nombre = $request->post('nombre');
        $cursos->grado_id = $request->post('grado_id');

        $cursos->save();

        return redirect()->route("curso.index")->with("success", "Actualizado con exito!");
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
        $cursos = Curso::find($id);
        $cursos->delete();
        return redirect()->route("curso.index")->with("success", "Eliminado con Exito!!");
    }
}
