<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Carrera;
use App\CarreraOfertada;
use App\NivelAcademico;
use App\LugarOferta;

class CarreraOfertadaController extends Controller
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
        $carrerasOfertadas = DB::table('carrera_ofertada as co')
            ->join('carrera as c', 'c.id', '=', 'co.idCarrera')
            ->join('nivel_academico as n','n.id','=','c.id_nivel')
            ->join('lugar_oferta as l','l.id','=','co.idLugar')
            ->select('co.*','c.sigla','c.nombre','n.nombre as nivel','l.nombre as lugar')->get();

        return view('crud.carreraOfertada.index',compact('carrerasOfertadas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles = NivelAcademico::pluck('nombre','id');
        $idNivel=$idCarrera=null;
        $lugares= LugarOferta::pluck('nombre','id');
        return view('crud.carreraOfertada.create',compact('niveles','idNivel','idCarrera','lugares'));
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
            'nivel'=>'required',
            'idCarrera'=>'required',
            'fechaInicio'=>'required',
            'fechaConclusion'=>'required'
        ]);

        //dd($request);
        $carrera= new CarreraOfertada($request->all());
        $carrera->save();
        \Flash::success("Se ha <strong>Registrado</strong> la Oferta de la Carrera =><strong> ".$carrera->nombre."</strong> de forma exitosa!");

        return redirect('ofertarCarrera');
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
    public function edit($idCarreraOfertada)
    {
        $carreraOfertada = CarreraOfertada::find($idCarreraOfertada);
        $niveles = NivelAcademico::pluck('nombre','id');
        $lugares= LugarOferta::pluck('nombre','id');
        $nivelActual=DB::table('carrera as c')
            ->join('nivel_academico as n', 'n.id', '=', 'c.id_nivel')
            ->where('c.id',$carreraOfertada->idCarrera)
            ->select('n.id')->get();
        $idNivel=$nivelActual[0]->id;
        $idCarrera=$carreraOfertada->idCarrera;


        return view('crud.carreraOfertada.edit',compact('carreraOfertada','lugares','niveles','idNivel','idCarrera'));
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
            'fechaInicio'=>'required',
            'fechaConclusion'=>'required'
        ]);
        $carreraOfertada = CarreraOfertada::findOrFail($id);
        //dd($carreraOfertada);
        $carreraOfertada->update($request->all());
        \Flash::success("Se ha <strong>Actualizado</strong> una Carrera Ofertada de forma exitosa!");
        return redirect('ofertarCarrera');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carreraOfertada = CarreraOfertada::findOrFail($id);
        CarreraOfertada::destroy($id);
        \Flash::success("Se ha <strong>Eliminado</strong> una Oferta de Carrera de forma exitosa!");
        return redirect('ofertarCarrera');
    }
}
