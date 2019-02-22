<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Http\Request;
use App\NivelAcademico;

class NivelAcademicoController extends Controller
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
            $niveles = NivelAcademico::get();
            return view('crud.nivel_academico.index',compact('niveles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.nivel_academico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'sigla'=>'required|max:2',
            'nombre'=>'required',
        ]);

        $nivel= new NivelAcademico($request->all());
        $nivel->save();
        \Flash::success("Se ha <strong>Registrado</strong> el Nivel Académico =><strong>".$nivel->nombre."</strong> de forma exitosa!");
        return redirect('nivel_academico');
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
        $nivel = NivelAcademico::find($id);
        return view('crud.nivel_academico.edit',compact('nivel'));
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
        $this->validate($request,[
            'sigla'=>'required|max:2',
            'nombre'=>'required',
        ]);
        $nivel = NivelAcademico::findOrFail($id);
        $nivel->update($request->all());
        \Flash::success("Se ha <strong>Actualizado</strong> el Nivel Académico =><strong>".$nivel->nombre."</strong> de forma exitosa!");
        return redirect('nivel_academico');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nivel = NivelAcademico::findOrFail($id);
        NivelAcademico::destroy($id);
        \Flash::success("Se ha <strong>Eliminado</strong> el Nivel Académico =><strong>".$nivel->nombre."</strong> de forma exitosa!");
        return redirect('nivel_academico');
    }

    public function getCarreras(Request $request, $id){
            $Carreras= Carrera::carreras($id);
            return response()->json($Carreras);
    }
}
