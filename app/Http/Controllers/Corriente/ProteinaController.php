<?php

namespace App\Http\Controllers\Corriente;

use App\Proteina;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ProteinaController extends Controller
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
        $proteinas = Proteina::all();

        return view('dashboard.createPro', compact('proteinas'));
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
            'name' => ['required','unique:proteinas,name','max:100'],
        ],[
            'name.required' => 'El campo de nombre es obligatorio.',
            'name.unique' => 'El nombre ingresado ya existe.',
            'name.max' => 'El alimento no puede tener más de 100 caracteres.',
        ]);

        if ($request->filled('disponible')) {

            Proteina::create([
                'name' => $name,
                'disponible' => true,
            ]);
        }else{
            Proteina::create([
                'name' => $name,
                'disponible' => false,
            ]);
        }

        return redirect()->route('proteina.create');
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
        $proteina = Proteina::findOrFail($id);

        return view('dashboard.editPro',compact('proteina'));
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
        $proteina = Proteina::findOrFail($id);

        $name = $request->input('name');
        $disponible = $request->input('disponible');

        $data = request()->validate([
            'name' => ['required',Rule::unique('proteinas')->ignore($id),'max:100'],
        ],[
            'name.required' => 'El campo de nombre es obligatorio.',
            'name.unique' => 'El nombre ingresado ya existe.',
            'name.max' => 'El alimento no puede tener más de 100 caracteres.',
        ]);

        if ($request->filled('disponible')) {
            $proteina->disponible = $disponible;
            $proteina->save();
        }else{
            $proteina->disponible = false;
            $proteina->save();
        }
        if($name != $proteina->name){
            $proteina->name = $name;
            $proteina->save();
        }

        return redirect()->route('proteina.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proteina = Proteina::findOrFail($id);
        $proteina->delete();

        return redirect()->route('proteina.create');
    }
}
