<?php

namespace App\Http\Controllers;

use App\Ejecutivo;
use Illuminate\Http\Request;

class EjecutivoController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ejecutivos = Ejecutivo::all();

        return view('home.ejecutivo', compact('ejecutivos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' => 'required|unique:ejecutivos,name|max:100',
            'precio' => 'required|numeric',
        ],[
            'nombre.required' => 'El campo de nombre es obligatorio.',
            'nombre.unique' => 'El nombre ingresado ya existe.',
            'precio.required' => 'El campo de precio es obligatorio.',
            'nombre.max' => 'El alimento no puede tener más de 100 caracteres.',
            'precio.numeric' => 'El precio debe ser un número.',
        ]);


        $nombre = $request->input('nombre');
        $precio = $request->input('precio');
        $checkbox = $request->input('disponible');
        // $switch = $request->input('switch');

        if($checkbox === '1'){
            Ejecutivo::create([
                'name' => $nombre,
                'precio' => $precio,
                'disponible' => true,
            ]);
        }else {
            Ejecutivo::create([
                'name' => $nombre,
                'precio' => $precio,
            ]);
        }

        return redirect()->route('ejecutivo.create');
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
}
