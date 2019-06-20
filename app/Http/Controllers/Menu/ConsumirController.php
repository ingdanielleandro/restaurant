<?php

namespace App\Http\Controllers\Menu;

use App\Proteina;
use App\Principio;
use App\Sopa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsumirController extends Controller
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
        $proteinas = Proteina::where('estado', 1)->get();
        $principios = Principio::where('estado', 1)->get();
        $sopas = Sopa::where('estado', 1)->get();

        return view('consumir.consumir', compact('proteinas','principios','sopas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arrayPro = $request->input('proteina');
        $arrayPri = $request->input('principio');
        $arraySop = $request->input('sopa');

        if (isset($arrayPro)) {
            foreach ($arrayPro as $key) {
            $proteina = Proteina::where('id', $key)->update([
                'agotado' => false,
            ]);
        }
        }elseif (isset($arrayPri)) {
            foreach ($arrayPri as $key) {
            $principio = Principio::where('id', $key)->update([
                'agotado' => false,
            ]);
        }
        }elseif (isset($arraySop)) {
            foreach ($arraySop as $key) {
            $sopa = Sopa::where('id', $key)->update([
                'agotado' => false,
            ]);                }
        }

        return redirect()->route('consumir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore()
    {
            $proteinas = Proteina::where('estado', 1)->get();
            foreach($proteinas as $proteina){
            $proteina->agotado = false;
            $proteina->save();
            }

            $principios = Principio::where('estado', 1)->get();
            foreach($principios as $principio){
            $principio->agotado = false;
            $principio->save();
            }

            $sopas = Sopa::where('estado', 1)->get();
            foreach($sopas as $sopa){
            $sopa->agotado = false;
            $sopa->save();
            }

        return redirect()->route('consumir.create');
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
