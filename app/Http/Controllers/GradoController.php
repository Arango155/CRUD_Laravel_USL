<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $grados = Grado::orderBy('id','desc')->paginate(3);
        return view('grado.listar_grado', compact('grados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        return view('grado.agregar_grado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $grado = new Grado();
        $grado->id = $request->post('id');
        $grado->nombre = $request->post('nombre');

        $grado->save();

        return redirect()->route("grado.index")->with("success", "Agregado con exito!");*/



        try {
            $validateData =validator::make ($request->all(),[
                'id' => 'required|integer',
                'nombre' => 'string',



            ])->safe()->all();

            /*Sirve para guardar datos en la base de datos*/
            $grados = new Grado();
            $grados->id = $validateData['id'];
            $grados->nombre= $validateData['nombre'];



            $grados->save();

            return redirect()->route("grado.index")->with("success", "Agregado con exito!");

        } catch (QueryException $e) {
            if ($e->getCode() === '22003') {
                /*Error 22003: Valor numérico fuera de rango*/
                return redirect()->back()->with('error', 'Error al crear el registro: Valor del registro fuera de rango');
            } else {
                /* Otro error de clave foránea o error de base de datos*/
                return redirect()->back()->with('error', 'error de base de datos : ' . $e->getMessage());
            }
        }

        catch (\Exception $e) {
             /*Capturar excepción general
             Manejar cualquier otro tipo de excepción que pueda ocurrir*/
            return redirect()->back()->with('error', 'Error de otro tipo fuera del crud publicación: ' . $e->getMessage());
        }

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
        $grados = Grado::find($id);
        return view('grado.eliminar_grado', compact('grados'));
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
        $grados = Grado::find($id);
        return view('grado.actualizar_grado', compact('grados'));
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
        $grados = Grado::find($id);
        $grados->id = $request->post('id');
        $grados->nombre = $request->post('nombre');

        $grados->save();

        return redirect()->route("grado.index")->with("success", "Actualizado con exito!");
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
        $grados = Grado::find($id);
        $grados->delete();
        return redirect()->route("grado.index")->with("success", "Eliminado con Exito!!");
    }

}
