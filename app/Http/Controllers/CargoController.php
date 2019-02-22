<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;

class CargoController extends Controller
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
        $cargos = Cargo::get();
        //->paginate(1);
        //return view('estudiante.index',['estudiantes'=>$estudiantes]);
        return view('crud.cargo.index',compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.cargo.create');
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
        $cargo= new Cargo($request->all());
        $cargo->nombre=$cargo->nombre;
        $cargo->save();
        \Flash::success("Se ha <strong>Registrado</strong> el Cargo =><strong>".$cargo->nombre."</strong> de forma exitosa!");
        return redirect('cargo');
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
        $cargo = Cargo::find($id);
        return view('crud.cargo.edit',compact('cargo'));
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
        $cargo = Cargo::findOrFail($id);
        $cargo->update($request->all());
        \Flash::success("Se ha <strong>Actualizado</strong> el Cargo =><strong>".$cargo->nombre."</strong> de forma exitosa!");
        return redirect('cargo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargo = Cargo::findOrFail($id);
        Cargo::destroy($id);
        \Flash::success("Se ha <strong>Eliminado</strong> el Cargo =><strong>".$cargo->nombre."</strong> de forma exitosa!");
        return redirect('cargo');
    }
}
