<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use App\Autoridad;
use App\Cargo;

class autoridadController extends Controller
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
            $autoridades = DB::table('autoridad as a')
                ->join('cargo as c', 'c.id', '=', 'a.id_cargo')
                ->select('a.*','c.nombre as N')->get();
            return view('crud.autoridad.index',compact('autoridades'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::pluck('nombre','id');
        return view('crud.autoridad.create',compact('cargos'));
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
            'rango'=>'required|max:6',
            'nombres'=>'required',
            'apellidos'=>'required',
            'id_cargo'=>'required',
        ]);
        $autoridad= new Autoridad($request->all());
        $autoridad->save();
        \Flash::success("Se ha <strong>Registrado</strong> la Autoridad =><strong> ".$autoridad->nombres."</strong> de forma exitosa!");
        return redirect('autoridad');
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
        $autoridad = Autoridad::find($id);
        return view('crud.autoridad.edit',compact('autoridad','cargos'));
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
            'rango'=>'required|max:6',
            'nombres'=>'required',
            'apellidos'=>'required',
            'id_cargo'=>'required',
        ]);
        $autoridad = Autoridad::findOrFail($id);
        $autoridad->update($request->all());
        \Flash::success("Se ha <strong>Actualizado</strong> la Autoridad =><strong> ".$autoridad->nombres."</strong> de forma exitosa!");
        return redirect('autoridad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autoridad = Autoridad::findOrFail($id);
        Autoridad::destroy($id);
        \Flash::success("Se ha <strong>Eliminado</strong> la autoridad =><strong> ".$autoridad->nombres."</strong> de forma exitosa!");
        return redirect('autoridad');
    }
}
