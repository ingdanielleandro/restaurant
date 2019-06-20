<?php

namespace App\Http\Controllers\Ejecutivo;

use App\Ejecutivo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

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

        return view('ejecutivo.create', compact('ejecutivos'));
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
            'name' => 'required|unique:ejecutivos,name|max:100',
            'precio' => 'required|numeric',
        ],[
            'name.required' => 'El campo de nombre es obligatorio.',
            'name.unique' => 'El nombre ingresado ya existe.',
            'precio.required' => 'El campo de precio es obligatorio.',
            'nombre.max' => 'El alimento no puede tener más de 100 caracteres.',
            'precio.numeric' => 'El precio debe ser un número.',
        ]);

        $name = $request->input('name');
        $precio = $request->input('precio');
        $disponible = $request->input('disponible');

        if ($request->filled('disponible')) {
            Ejecutivo::create([
                'name' => $name,
                'precio' => $precio,
                'disponible' => true,
            ]);
        }else{
            Ejecutivo::create([
                'name' => $name,
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
        $ejecutivo = Ejecutivo::findOrFail($id);

        return view('ejecutivo.edit',compact('ejecutivo'));
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
        $ejecutivo = Ejecutivo::findOrFail($id);

        $name = $request->input('name');
        $precio = $request->input('precio');
        $disponible = $request->input('disponible');

        $data = request()->validate([
            'name' => ['required',Rule::unique('ejecutivos')->ignore($id),'max:100'],
        ],[
            'name.required' => 'El campo de nombre es obligatorio.',
            'name.unique' => 'El nombre ingresado ya existe.',
            'name.max' => 'El alimento no puede tener más de 100 caracteres.',
        ]);

        if ($request->filled('disponible')) {
            $ejecutivo->disponible = $disponible;
            $ejecutivo->save();
        }else{
            $ejecutivo->disponible = false;
            $ejecutivo->save();
        }
        if($name != $ejecutivo->name){
            $ejecutivo->name = $name;
            $ejecutivo->save();
        }
        if($precio != $ejecutivo->precio){
            $ejecutivo->precio = $precio;
            $ejecutivo->save();
        }

        return redirect()->route('ejecutivo.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ejecutivo = Ejecutivo::findOrFail($id);
        $ejecutivo->delete();

        return redirect()->route('ejecutivo.create');
    }
}
