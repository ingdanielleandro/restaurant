<?php

namespace App\Http\Controllers\Corriente;

use App\Sopa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class SopaController extends Controller
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
        $sopas = Sopa::all();

        return view('corriente.createSop', compact('sopas'));
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
            'name' => ['required','unique:sopas,name','max:100'],
        ],[
            'name.required' => 'El campo de nombre es obligatorio.',
            'name.unique' => 'El nombre ingresado ya existe.',
            'name.max' => 'El alimento no puede tener más de 100 caracteres.',
        ]);

        if ($request->filled('disponible')) {

            Sopa::create([
                'name' => $name,
                'disponible' => true,
            ]);
        }else{
            Sopa::create([
                'name' => $name,
                'disponible' => false,
            ]);
        }

        return redirect()->route('sopa.create');
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
        $sopa = Sopa::findOrFail($id);

        return view('corriente.editSop',compact('sopa'));
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
        $sopa = Sopa::findOrFail($id);

        $name = $request->input('name');
        $disponible = $request->input('disponible');

        $data = request()->validate([
            'name' => ['required',Rule::unique('sopas')->ignore($id),'max:100'],
        ],[
            'name.required' => 'El campo de nombre es obligatorio.',
            'name.unique' => 'El nombre ingresado ya existe.',
            'name.max' => 'El alimento no puede tener más de 100 caracteres.',
        ]);

        if ($request->filled('disponible')) {
            $sopa->disponible = $disponible;
            $sopa->save();
        }else{
            $sopa->disponible = false;
            $sopa->save();
        }
        if($name != $sopa->name){
            $sopa->name = $name;
            $sopa->save();
        }

        return redirect()->route('sopa.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sopa = Sopa::findOrFail($id);
        $sopa->delete();

        return redirect()->route('sopa.create');
    }
}
