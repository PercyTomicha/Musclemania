<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use App\NivelAcademico;
use App\Cargo;
use App\Firmante;

class FirmanteController extends Controller
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
        $firmantes = DB::table('firmante as f')
                            ->join('nivel_academico as n', 'n.id', '=', 'f.id_nivel')
                            ->join('cargo as c', 'c.id', '=', 'f.id_cargo')
                            ->select('f.*','n.nombre as nivel','c.nombre as cargo')->get();
        //->paginate(1);
        //return view('estudiante.index',['estudiantes'=>$estudiantes]);
        return view('crud.firmante.index',compact('firmantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::pluck('nombre','id');
        $niveles = NivelAcademico::pluck('nombre','id');
        return view('crud.firmante.create',compact('cargos','niveles'));
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
            'id_nivel'=>'required',
            'id_cargo'=>'required',
        ]);
        $firmante= new Firmante($request->all());
        $firmante->save();
        \Flash::success("Se ha <strong>Registrado</strong> un Nuevo Firmante de forma exitosa!");
        return redirect('firmante');
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
        $cargos = Cargo::pluck('nombre','id');
        $niveles = NivelAcademico::pluck('nombre','id');
        $firmante = Firmante::find($id);
        return view('crud.firmante.edit',compact('firmante','cargos','niveles'));
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
            'id_nivel'=>'required',
            'id_cargo'=>'required',
        ]);
        $firmante = Firmante::findOrFail($id);
        $firmante->update($request->all());
        \Flash::success("Se ha <strong>Actualizado</strong> un Firmante de forma exitosa!");
        return redirect('firmante');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $firmante = Firmante::findOrFail($id);
        Firmante::destroy($id);
        \Flash::success("Se ha <strong>Eliminado</strong> un Firmante de forma exitosa!");
        return redirect('firmante');
    }
}
