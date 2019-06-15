<?php

namespace App\Http\Controllers\Corriente;

use App\Proteina;
use App\Principio;
use App\Sopa;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CorrienteController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proteinas = Proteina::all();
        $principios = Principio::all();
        $sopas = Sopa::all();

        return view('home.corriente', compact('proteinas','principios','sopas'));
    }
    /**
     * Guardar alimentos en la base.
     *
     */
    public function store(Request $request)
    {

        $this->nombre = $request->input('nombre');
        $this->switch = $request->input('disponible');
        $this->opcion = $request->input('seleccion');
        $this->request = $request;

        if($this->opcion != 'Escoger...'){

            $data = request()->validate([
                'nombre' => ['required','unique:'.$this->opcion.',name','max:100'],
            ],[
                'nombre.required' => 'El campo de nombre es obligatorio.',
                'nombre.unique' => 'El nombre ingresado ya existe.',
                'nombre.max' => 'El alimento no puede tener más de 100 caracteres.',
            ]);

            $this->validarSeleccion();
        }

        return redirect()->route('corriente.create');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPro($id)
    {
        $proteina = Proteina::findOrFail($id);

        return view('home.editPro',compact('proteina'));
    }
        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPri($id)
    {
        $principio = Principio::findOrFail($id);

        return view('home.editPri',compact('principio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSop($id)
    {
        $sopa = Sopa::findOrFail($id);

        return view('home.editSop',compact('sopa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePro(Request $request, $id)
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

        return redirect()->route('corriente.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePri(Request $request, $id)
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

        return redirect()->route('corriente.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSop(Request $request, $id)
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

        return redirect()->route('corriente.create');
    }

    /**
     * Eliminar proteinas.
     * $id
     * proteina.destroy.
     */
    public function destroyPro($id)
    {
        $proteina = Proteina::findOrFail($id);
        $proteina->delete();

        return redirect()->route('corriente.create');
    }
        /**
     * Eliminar principios
     * $id
     * principio.destroy
     */
    public function destroyPri($id)
    {
        $principio = Principio::findOrFail($id);
        $principio->delete();

        return redirect()->route('corriente.create');
    }

    /**
     * Eliminar principios
     * $id
     * principio.destroy
     */
    public function destroySop($id)
    {
        $sopa = Sopa::findOrFail($id);
        $sopa->delete();

        return redirect()->route('corriente.create');
    }

    /**
     *
     * validacion de la entrada seleccion para
     * la creacion de una proteina o
     * principio.
     * utilizada en la funcion Store.
     */
    protected function validarSeleccion()
    {
        $seleccion = $this->opcion;
        $name = $this->nombre;
        $disponible = $this->switch;
        $request = $this->request;

        if ($request->filled('disponible')) {
            if($seleccion === 'proteinas'){
                Proteina::create([
                    'name' => $name,
                    'disponible' => $disponible,
                ]);
            }else if($seleccion === 'principios'){
                Principio::create([
                    'name' => $name,
                    'disponible' => $disponible,
                ]);
            }else if($seleccion === 'sopas'){
                Sopa::create([
                    'name' => $name,
                    'disponible' => $disponible,
                ]);
            }
        }else{
            if($seleccion === 'proteinas'){
                Proteina::create([
                    'name' => $name,
                    'disponible' => false,
                ]);
            }else if($seleccion === 'principios'){
                Principio::create([
                    'name' => $name,
                    'disponible' => false,
                ]);
            }else if($seleccion === 'sopas'){
                Sopa::create([
                    'name' => $name,
                    'disponible' => false,
                ]);
            }
        }
    }

}
