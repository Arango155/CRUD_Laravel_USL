<?php

namespace App\Http\Controllers;

use App\Exports\AlumnosExport;
use App\Models\Alumno;

use App\Models\Curso;
use App\Models\Grado;
use App\Models\Sucursal;
use Illuminate\Http\Request;



use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

use Maatwebsite\Excel\Facades\Excel;
use function GuzzleHttp\Promise\all;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //protected $connection= 'alumno_table';

        public function index2 (Request $request)
    {
//        $texto=trim($request->get('texto'));
//        $alumnos = Alumno::orderBy('id', 'asc')->select('id','nombre','apellido','sucursal_id','grado_id','curso1_id','curso2_id')
//            ->where('sucursal_id','LIKE','%',$texto,'%')
//            ->orderBY('sucursal_id','asc')
//            ->paginate(10);
//        return view('alumno.listar_alumno', compact('alumnos'));

            $alumnos = Alumno::orderBy('id', 'asc')->paginate(25);
            return view('alumno.listar_alumno', compact('alumnos'));

    }

    public function index()
    {
      return view('alumno.listar-alumno');
    }


    public function exporAllAlumnos()
    {
        return Excel::download(new AlumnosExport(), 'alumnos.xlsx');
    }


    public function reporte(Request $request)
    {
        $query = Alumno::query();

        if ($request->filled('filtro_id')) {
            $query->where('id', $request->input('filtro_id'));
        }

        // Agrega los demás filtros según tus necesidades

        $alumnos = $query->paginate(10);
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
        $grados = Grado::all(); // Obtener todos los grados desde la base de datos
        $sucursales = Sucursal::all(); // Obtener todos las sucursales desde la base de datos
        $cursos = Curso::all(); // Obtener todos las cursos desde la base de datos
        return view('alumno.agregar_alumno', compact('grados', 'sucursales', 'cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $alumnos = new Alumno();
//
//        $alumnos->id = $request->post('id');
//        $alumnos->nombre = $request->post('nombre');
//        $alumnos->apellido = $request->post('apellido');
//        $alumnos->sucursal_id = $request->post('sucursal_id');
//        $alumnos->grado_id = $request->post('grado_id');
//        $alumnos->curso1_id = $request->post('curso1_id');
//        $alumnos->curso2_id = $request->post('curso2_id');
//        //$alumnos->nota1 = $request->post('nota1');
//        //$alumnos->nota2 = $request->post('nota2');
//        $alumnos->fecha_registro = $request->post('fecha_registro');
//
//
//        $alumnos->save();
//
//        return redirect()->route("alumno.index2")->with("success", "Agregado con exito!");

        try {
            $validateData =validator::make ($request->all(),[
                'id' => 'required|integer',
                'nombre' => 'string',
                'apellido' => 'string ',
                'sucursal_id' => 'string',
                'grado_id' => 'string',
                'curso1_id' => 'string',
                'curso2_id' => 'string',
//                'nota1' => 'string',
//                'nota2' => 'string',
                'fecha_registro' => 'string',



            ])->safe()->all();

            //Sirve para guardar datos en la base de datos
            $alumnos = new Alumno();
            $alumnos->id = $validateData['id'];
            $alumnos->nombre= $validateData['nombre'];
            $alumnos->apellido = $validateData['apellido'];
            $alumnos->sucursal_id = $validateData['sucursal_id'];
            $alumnos->grado_id = $validateData['grado_id'];
            $alumnos->curso1_id = $validateData['curso1_id'];
            $alumnos->curso2_id = $validateData['curso2_id'];
//            $alumnos->nota1 = $validateData['nota1'];
//            $alumnos->nota2 = $validateData['nota2'];
            $alumnos->fecha_registro = $validateData['fecha_registro'];

            $alumnos->save();

            return redirect()->route("alumno.index2")->with("success", "Agregado con exito!");

        } catch (QueryException $e) {
            if ($e->getCode() === '22003') {
                // Error 22003: Valor numérico fuera de rango
                return redirect()->back()->with('error', 'Error al crear camiones: Valor de transporte fuera de rango');
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
        $alumnos = Alumno::find($id);
        return view("alumno.eliminar_alumno", compact('alumnos'));
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
        return view("alumno.actualizar_alumno", compact('alumnos', 'grados', 'sucursales', 'cursos'));
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
        $alumnos = Alumno::find($id);

        $alumnos->id = $request->post('id');
        $alumnos->nombre = $request->post('nombre');
        $alumnos->apellido = $request->post('apellido');
        $alumnos->sucursal_id = $request->post('sucursal_id');
        $alumnos->grado_id = $request->post('grado_id');
        $alumnos->curso1_id = $request->post('curso1_id');
        $alumnos->curso2_id = $request->post('curso2_id');

        $alumnos->fecha_registro = $request->post('fecha_registro');


        $alumnos->save();

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
        $alumnos = Alumno::find($id);
        $alumnos->delete();
        return redirect()->route("alumno.index2")->with("success", "Eliminado con exito!");
    }
}
