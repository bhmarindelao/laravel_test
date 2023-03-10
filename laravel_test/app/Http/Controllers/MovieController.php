<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['movies']=Movie::paginate(5); //Paginación base
        return view('movie.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campos=[
            'Name'=>'required|string|max:100',
            'Year'=>'required|max:4',
            'Genre'=>'required|string|max:50',
            'Description'=>'required|string|max:100000',
            'Featuring'=>'required|string|max:100',
            'Director'=>'required|string|max:100',
            'Photo'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'Name.required'=>'El nombre es requerido',
            'Year.required'=>'El año es requerido',
            'Genre.required'=>'El género es requerido (min:1)',
            'Description.required'=>'La descripción es requerida',
            'Featuring.required'=>'El o la protagonista es requerido (o requerida)',
            'Director.required'=>'El director (o la directora) es requerido',
            'Photo.required'=>'La foto es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        //Guardado de datos, excepto el token de seguridad
        $datosMovie = request()->except('_token');

        //Almacenamiento para Cartel
        if($request->hasFile('Photo')){
            $datosMovie['Photo']=$request->file('Photo')->store('uploads','public');
        }


        Movie::insert($datosMovie);
        return redirect('movie')->with('mensaje','Película añadida con éxito');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $movie=Movie::findOrFail($id);
        return view('movie.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Para actualizar, borra los campos y pinta los nuevos
        $campos=[
            'Name'=>'required|string|max:100',
            'Year'=>'required|max:4',
            'Genre'=>'required|string|max:50',
            'Description'=>'required|string|max:100000',
            'Featuring'=>'required|string|max:100',
            'Director'=>'required|string|max:100',

        ];

        $mensaje=[
            'Name.required'=>'El nombre es requerido',
            'Year.required'=>'El año es requerido',
            'Genre.required'=>'El género es requerido (min:1)',
            'Description.required'=>'La descripción es requerida',
            'Featuring.required'=>'El o la protagonista es requerido (o requerida)',
            'Director.required'=>'El director (o la directora) es requerido',

        ];
        //Para el cartel, pregunta si existe la foto, y después del borrado, debe pintar un nuevo cartel
        if($request->hasFile('Photo')){
            $campos=['Photo'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Photo.required'=>'La foto es requerida'];
        }

        $this->validate($request, $campos, $mensaje);
        //
        $datosMovie = request()->except(['_token','_method']);

        if($request->hasFile('Photo')){
            //Revisa si existe una foto almacenada
            $movie=Movie::findOrFail($id);
            //Si existe y desea actualizarse, borra la anterior
            Storage::delete('public/'.$movie->Photo);
            //Para guardar la nueva fotografía
            $datosMovie['Photo']=$request->file('Photo')->store('uploads','public');
        }

        //Actualiza la base de datos
        Movie::where('id','=',$id)->update($datosMovie);
        $movie=Movie::findOrFail($id); //Busca la información
        return redirect('movie')->with('mensaje','Película modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Borrar registro de película

        $movie=Movie::findOrFail($id);
        //Pregunta para borrar la foto asociada
        if(Storage::delete('public/'.$movie->Photo)){
            //Si borra la imagen, elimina el resto de data
            Movie::destroy($id);
        }

        return redirect('movie')->with('mensaje','Película borrada');
    }
}
