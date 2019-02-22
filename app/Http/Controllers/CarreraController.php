<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use App\Carrera;
use App\NivelAcademico;


class CarreraController extends Controller
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
//        if(\Auth::check()){
//
//        }else{
//            return view('index');
//        }
        $carreras = DB::table('carrera as c')
            ->join('nivel_academico as n', 'n.id', '=', 'c.id_nivel')
            ->select('c.*','n.nombre as N')->get();
        //->paginate(1);
        //return view('estudiante.index',['estudiantes'=>$estudiantes]);
        return view('crud.carrera.index',compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles = NivelAcademico::pluck('nombre','id');
        return view('crud.carrera.create',compact('niveles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->id_nivel==3){
            $this->validate($request,[
                'sigla'=>'required|max:3',
                'nombre'=>'required',
                'id_nivel'=>'required',
                'costo'=>'required',
                'horas'=>'required',
            ]);
        }else{
            $this->validate($request,[
                'sigla'=>'required|max:3',
                'nombre'=>'required',
                'id_nivel'=>'required',
                'costo'=>'required',
            ]);
        }

        $carrera= new Carrera($request->all());
        if($carrera->id_nivel!=3){
            $carrera->horas=null;
        }

//        dd($carrera->horas);
        $carrera->save();
        \Flash::success("Se ha <strong>Registrado</strong> la Carrera =><strong> ".$carrera->nombre."</strong> de forma exitosa!");
        return redirect('carrera');
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
        $niveles = NivelAcademico::pluck('nombre','id');
        $carrera = Carrera::find($id);

        $nivelActual=$carrera->id_nivel;
        return view('crud.carrera.edit',compact('carrera','niveles','nivelActual'));
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
        if($request->id_nivel==3){
            $this->validate($request,[
                'sigla'=>'required|max:3',
                'nombre'=>'required',
                'id_nivel'=>'required',
                'costo'=>'required',
                'horas'=>'required',
            ]);
        }else{
            $this->validate($request,[
                'sigla'=>'required|max:3',
                'nombre'=>'required',
                'id_nivel'=>'required',
                'costo'=>'required',
            ]);
        }
        $carrera = Carrera::findOrFail($id);
        $datosActualizar=$request->all();
        if($datosActualizar['id_nivel']!=3){
            $datosActualizar['horas']=null;
        }
//        dd($datosActualizar);
        $carrera->update($datosActualizar);

        \Flash::success("Se ha <strong>Actualizado</strong> la Carrera =><strong> ".$carrera->nombre."</strong> de forma exitosa!");
        return redirect('carrera');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrera = Carrera::findOrFail($id);
        Carrera::destroy($id);
        \Flash::success("Se ha <strong>Eliminado</strong> la Carrera =><strong> ".$carrera->nombre."</strong> de forma exitosa!");
        return redirect('carrera');
    }
}
