<?php

namespace App\Http\Controllers;

use App\Proteina;
use App\Principio;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.index');
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

        return view('home.corriente', compact('proteinas','principios'));
    }
    public function store(Request $request)
    {

        $this->nombre = $request->input('nombre');
        $this->switch = $request->input('disponible');
        $this->opcion = $request->input('seleccion');

        $this->validarSeleccion();

        return redirect()->route('corriente.create');

    }
    protected function validarSeleccion()
    {
        $seleccion = $this->opcion;
        $name = $this->nombre;
        $disponible = $this->switch;

        $data = request()->validate([
                    'nombre' => ['required','unique:'.$seleccion.',name','max:100'],
                ],[
                    'nombre.required' => 'El campo de nombre es obligatorio.',
                    'nombre.unique' => 'El nombre ingresado ya existe.',
                    'nombre.max' => 'El alimento no puede tener más de 100 caracteres.',
                ]);

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
        }
    }
}
