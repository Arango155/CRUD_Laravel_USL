<?php

namespace App\Http\Controllers;


use App\Models\Catedratico;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

use function GuzzleHttp\Promise\all;

class CatedraticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $catedraticos = Catedratico::orderBy('id', 'desc')->paginate(3);
        return view('catedratico/listar_catedratico', compact('catedraticos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('catedratico.agregar_catedratico');
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
//        $catedraticos = new Catedratico();
//        $catedraticos->id = $request->post('id');
//        $catedraticos->nombre = $request->post('nombre');
//        $catedraticos->apellido = $request->post('apellido');
//        $catedraticos->telefono = $request->post('telefono');
//        $catedraticos->email = $request->post('email');
//        $catedraticos->direccion = $request->post('direccion');
//
//        $catedraticos->save();
//
//        return redirect()->route("catedratico.index")->with("success", "Agregado con exito!");



        try {
            $validateData =validator::make ($request->all(),[
                'id' => 'required|integer',
                'nombre' => 'string',
                'apellido' => 'string ',
                'telefono' => 'string',
                'email' => 'string',
                'direccion' => 'string ',



            ])->safe()->all();

            //Sirve para guardar datos en la base de datos

            $catedraticos = new Catedratico();
            $catedraticos->id = $validateData['id'];
            $catedraticos->nombre= $validateData['nombre'];
            $catedraticos->apellido = $validateData['apellido'];
            $catedraticos->telefono = $validateData['telefono'];
            $catedraticos->email = $validateData['email'];
            $catedraticos->direccion = $validateData['direccion'];

            $catedraticos->save();

            return redirect()->route("catedratico.index")->with("success", "Agregado con exito!");

        } catch (QueryException $e) {
            if ($e->getCode() === '22003') {
                // Error 22003: Valor numérico fuera de rango
                return redirect()->back()->with('error', 'Error al crear catedraticos: Valor fuera de rango');
            } else {
                // Otro error de clave foránea o error de base de datos
                return redirect()->back()->with('error', 'error de base de datos : ' . $e->getMessage());
            }
        }

        catch (\Exception $e) {
//             Capturar excepción general
//             Manejar cualquier otro tipo de excepción que pueda ocurrir
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
        $catedraticos = Catedratico::find($id);
        return view('catedratico.eliminar_catedratico', compact('catedraticos'));


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
        $catedraticos = Catedratico::find($id);
        return view('catedratico.actualizar_catedratico', compact('catedraticos'));
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
        $catedraticos = Catedratico::find($id);
        $catedraticos->id = $request->post('id');
        $catedraticos->nombre = $request->post('nombre');
        $catedraticos->apellido = $request->post('apellido');
        $catedraticos->telefono = $request->post('telefono');
        $catedraticos->email = $request->post('email');
        $catedraticos->direccion = $request->post('direccion');

        $catedraticos->save();

        return redirect()->route("catedratico.index")->with("success", "Actualizado con exito!");
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
        $catedraticos = Catedratico::find($id);
        $catedraticos->delete();
        return redirect()->route("catedratico.index")->with("success", "Eliminado con Exito!!");
    }
}
