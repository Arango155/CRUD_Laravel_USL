<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public $searchFilter;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $alumnos = Alumno::orderBy('id', 'asc')->paginate(25);
        return view('reporte.reporte_alumno', compact('alumnos'));
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

   /* public function search(Request $request){

        $busqueda = $request->get('busqueda');
        $alumnos = Alumno::where('id','LIKE','%'.$busqueda.'%')
            ->orwhere('nombre','LIKE','%'.$busqueda.'%')
            ->latest('id');

        $data=[
            'alumnos'=>$alumnos,
            'busqueda'=>$busqueda,
        ];


        return view('reporte.reporte_alumno', compact('busqueda','alumnos'));

        /** $alumnos = Alumno::with('alumno')
            ->when($request->alumno_id, function ($query) use ($request){
                return $query-where('alumno_id', $request->alumno_id);
            })->get();
        $alumnos = Alumno::all();
         *
        return view('reporte.reporte_alumno', compact('alumnos'));


        ->when($this->$searchFilter, function($query) {
                $query->where('id', 'like', '%' . $this->searchFilter . '%');
            });

               */




}
