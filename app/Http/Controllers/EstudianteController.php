<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['estudiantes'] = Estudiante::paginate(1);
        return view('estudiante.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosEstudiante = request()->all();

        $validacion = [
            'nombre' => 'required|string|max:15',
            'apellidoPaterno' => 'required|string|max:15',
            'apellidoMaterno' => 'required|string|max:15',
            'correo' => 'required|email',
            'foto' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensajeValidacion = [
            'required' => 'El :attribute es requerido',
            'foto.required'=> 'Favor de subir una foto'
        ];

        $this->validate($request, $validacion, $mensajeValidacion);

        $datosEstudiante = request()->except('_token');
        if ($request->hasFile('foto')) {
            # code...
            $datosEstudiante['foto']=$request->file('foto')->store('uploads', 'public');
        }
        Estudiante::insert($datosEstudiante);
        //eturn response()->json($datosEstudiante);
        return redirect('estudiante')->with('mensaje', 'Estudiante agregado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $estudiante = Estudiante::findOrFail($id);
        return view('estudiante.edit', compact('estudiante'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validacion = [
            'nombre' => 'required|string|max:15',
            'apellidoPaterno' => 'required|string|max:15',
            'apellidoMaterno' => 'required|string|max:15',
            'correo' => 'required|email'
        ];

        $mensajeValidacion = [
            'required' => 'El :attribute es requerido',
        ];

        if ($request->hasFile('foto')) {
            $validacion=['foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
            $mensajeValidacion = ['foto.required' => 'Favor de subir una foto'];
        }

        $this->validate($request, $validacion, $mensajeValidacion);

        $datosEstudiante = request()->except(['_token', '_method']);
        if ($request->hasFile('foto')) {
            # code...
            $estudiante = Estudiante::findOrFail($id);
            Storage::delete('public/'.$estudiante->foto);

            $datosEstudiante['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Estudiante::where('id', '=', $id)->update($datosEstudiante);
        $estudiante = Estudiante::findOrFail($id);

        //return view('estudiante.edit', compact('estudiante'));
        return redirect('estudiante')->with('mensaje', 'Estudiante modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $estudiante = Estudiante::findOrFail($id);
        if (Storage::delete('public/'.$estudiante->foto)) {
            # code...
            Estudiante::destroy($id);
        }
        return redirect('estudiante')->with('mensaje', 'Estudiante eliminado con éxito');
    }
}
