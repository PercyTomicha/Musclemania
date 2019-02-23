<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Alimentacion;

class AlimentacionController extends Controller
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
            $alimentaciones = Alimentacion::orderby('id','asc')->get();
            return view('crud.alimentacion.index',compact('alimentaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.alimentacion.create');
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
            'nombre'=>'required',
        ]);
        
        $alimentacion = new Alimentacion($request->all());
        $alimentacion->save();
        \Flash::success("Se ha <strong>Registrado</strong> la Alimentación =><strong>".$alimentacion->nombre."</strong> de forma exitosa!");
        return redirect('alimentacion');
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
        $alimentacion = Alimentacion::find($id);
        return view('crud.alimentacion.edit',compact('alimentacion'));
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
            'nombre'=>'required',
        ]);
        $alimentacion = Alimentacion::findOrFail($id);
        $alimentacion->update($request->all());
        \Flash::success("Se ha <strong>Actualizado</strong> la Alimentación =><strong>".$alimentacion->nombre."</strong> de forma exitosa!");
        return redirect('alimentacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alimentacion = Alimentacion::findOrFail($id);
        Alimentacion::destroy($id);
        \Flash::success("Se ha <strong>Eliminado</strong> la Alimentación =><strong>".$alimentacion->nombre."</strong> de forma exitosa!");
        return redirect('alimentacion');
    }
}
