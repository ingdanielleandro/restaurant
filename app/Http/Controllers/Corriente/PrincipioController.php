<?php

namespace App\Http\Controllers\Corriente;

use App\Principio;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PrincipioController extends Controller
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
        $principios = Principio::all();

        return view('corriente.createPri', compact('principios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $disponible = $request->input('disponible');

        $data = request()->validate([
            'name' => ['required','unique:principios,name','max:100'],
        ],[
            'name.required' => 'El campo de nombre es obligatorio.',
            'name.unique' => 'El nombre ingresado ya existe.',
            'name.max' => 'El alimento no puede tener más de 100 caracteres.',
        ]);

        if ($request->filled('disponible')) {

            Principio::create([
                'name' => $name,
                'disponible' => true,
            ]);
        }else{
            Principio::create([
                'name' => $name,
                'disponible' => false,
            ]);
        }

        return redirect()->route('principio.create');
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
        $principio = Principio::findOrFail($id);

        return view('corriente.editPri',compact('principio'));
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
        $principio = Principio::findOrFail($id);

        $name = $request->input('name');
        $disponible = $request->input('disponible');

        $data = request()->validate([
            'name' => ['required',Rule::unique('principios')->ignore($id),'max:100'],
        ],[
            'name.required' => 'El campo de nombre es obligatorio.',
            'name.unique' => 'El nombre ingresado ya existe.',
            'name.max' => 'El alimento no puede tener más de 100 caracteres.',
        ]);

        if ($request->filled('disponible')) {
            $principio->disponible = $disponible;
            $principio->save();
        }else{
            $principio->disponible = false;
            $principio->save();
        }
        if($name != $principio->name){
            $principio->name = $name;
            $principio->save();
        }

        return redirect()->route('principio.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $principio = Principio::findOrFail($id);
        $principio->delete();

        return redirect()->route('principio.create');
    }
}
