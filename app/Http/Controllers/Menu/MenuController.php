<?php

namespace App\Http\Controllers\Menu;

use App\Proteina;
use App\Principio;
use App\Sopa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
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
        $disponiblePro = Proteina::where('disponible', 1)->get();
        $estadoPro = Proteina::where('estado', 1)->get();

        $disponiblePri = Principio::where('disponible', 1)->get();
        $estadoPri = Principio::where('estado', 1)->get();

        $disponibleSop = Sopa::where('disponible', 1)->get();
        $estadoSop = Sopa::where('estado', 1)->get();

        return view('menu.corriente',compact('disponiblePro','estadoPro','disponiblePri','estadoPri','disponibleSop','estadoSop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keyPro = $request->input('arrayPro');
        $keyPri = $request->input('arrayPri');
        $keySop = $request->input('arraySop');

        if (isset($keyPro)) {
            foreach ($keyPro as $key) {
            $proteina = Proteina::where('id', $key)->update([
                'estado' => 1,
                'agotado' => 1,
            ]);
        }
        }elseif (isset($keyPri)) {
            foreach ($keyPri as $key) {
            $principio = Principio::where('id', $key)->update([
                'estado' => 1,
                'agotado' => 1,
            ]);
        }
        }elseif (isset($keySop)) {
            foreach ($keySop as $key) {
            $sopa = Sopa::where('id', $key)->update([
                'estado' => 1,
                'agotado' => 1,
            ]);                }
        }

        return redirect()->route('corriente.create');

    }

        /**
     * restore a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restorePro()
    {
        $proteinas = Proteina::all();

        foreach ($proteinas as $proteina) {

          $proteina->estado = 0;
          $proteina->save();
        }

        return redirect()->route('corriente.create');
    }


        /**
     * restore a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restorePri()
    {
        $principios = Principio::all();

        foreach ($principios as $principio) {

          $principio->estado = 0;
          $principio->save();
        }

        return redirect()->route('corriente.create');
    }

        /**
     * restore a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restoreSop()
    {
        $sopas = Sopa::all();

        foreach ($sopas as $sopa) {

          $sopa->estado = 0;
          $sopa->save();
        }

        return redirect()->route('corriente.create');
    }

            /**
     * restore a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restoreAll()
    {
        $sopas = Sopa::all();
        $proteinas = Proteina::all();
        $principios = Principio::all();

        foreach ($sopas as $sopa) {
          $sopa->estado = 0;
          $sopa->save();
        }
        foreach ($proteinas as $proteina) {
            $proteina->estado = 0;
            $proteina->save();
        }
        foreach ($principios as $principio) {
            $principio->estado = 0;
            $principio->save();
        }

        return redirect()->route('corriente.create');
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
