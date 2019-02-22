<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LugarOferta;

class LugarOfertaController extends Controller
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
//        return "Hola Mundo";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
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

    public function setLugar(Request $request, $nombre){

        LugarOferta::insert(['nombre'=>$nombre]);

        $Lugares= LugarOferta::pluck('nombre','id');

        return response()->json($Lugares);

    }

    public function showLugar(Request $request){

        $Lugares= LugarOferta::pluck('nombre','id');
        return response()->json($Lugares);
    }

    public function deletLugar(Request $request, $id){
        $lugarO = LugarOferta::findOrFail($id);
        LugarOferta::destroy($id);
        \Flash::success("Se ha <strong>Eliminado</strong> un Lugar de Oferta: ".$lugarO->nombre." de forma exitosa!");
        return redirect('ofertarCarrera/create');
    }

}
