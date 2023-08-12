<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sucursales = Sucursal::orderBy('id', 'asc')->paginate(25);
        return view('sucursal.listar_sucursal', compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sucursal.agregar_sucursal');
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
        $sucursales = new Sucursal();
        $sucursales->id = $request->post('id');
        $sucursales->nombre = $request->post('nombre');
        $sucursales->save();

        return redirect()->route("sucursal.index")->with("success", "Agregado con exito!");
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
        $sucursales = Sucursal::find($id);
        return view("sucursal.eliminar_sucursal", compact('sucursales'));
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
        $sucursales = Sucursal::find($id);
        return view("sucursal.actualizar_sucursal", compact('sucursales'));
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
        $sucursales = Sucursal::find($id);

        $sucursales->id = $request->post('id');
        $sucursales->nombre = $request->post('nombre');


        $sucursales->save();

        return redirect()->route("sucursal.index")->with("success", "Actualizado con exito!");
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
        $sucursales = Sucursal::find($id);
        $sucursales->delete();
        return redirect()->route("sucursal.index")->with("success", "Eliminado con exito!");
    }
}
