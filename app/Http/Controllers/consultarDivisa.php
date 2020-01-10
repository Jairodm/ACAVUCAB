<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Divisa;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class consultarDivisa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consultar()
    {
        $divisa = Divisa::all();
        return view('divisas', compact('divisa'));
    }

    public function modificarValor($codigo_divisa)
    {
        $modDivisa = Divisa::findOrFail($codigo_divisa);
        return view('modificarDivisa', compact('modDivisa'));
    }

    public function actualizaValor(Request $request, $codigo_divisa){

        $request->validate([
            'valor_divisa' => 'required'
        ]);

        $actDivisa = Divisa::findOrFail($codigo_divisa);
        $actDivisa->valor_divisa = $request->valor_divisa;
        $actDivisa->save();
        return redirect()->route('divisas');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request)
    {
        $request->validate([
            'nombre_divisa' => 'required',
            'valor_divisa' => 'required'
        ]);


        $divisaNueva = new Divisa;
        $divisaNueva->nombre_divisa = $request->nombre_divisa;
        $divisaNueva->valor_divisa = $request->valor_divisa;
        $divisaNueva->save();
        return redirect()->route('divisas');
    }

    public function eliminaDivisa($codigo_divisa){
        $eliDivisa =  Divisa::findOrFail($codigo_divisa);
        $eliDivisa->delete();
        return redirect()->route('divisas');
    }


    public function index(){
        return view('registrarDivisa');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
