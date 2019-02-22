<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use App\Persona;
use App\Estudiante;
use Carbon\Carbon;


class EstudianteController extends Controller
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
        $estudiantes = DB::table('estudiante as e')
            ->join('persona as p', 'p.id', '=', 'e.id')
            ->select('p.*')->get();
        return view('crud.Persona.Estudiante.index',compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.Persona.Estudiante.create');
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
            'apellidoPaterno'=>'required',
        ]);
        $persona= new Persona($request->all());
        $persona->save();

        $estudiante= new Estudiante();
        $estudiante->id=$persona->id;
        $estudiante->fechaRegistro=Carbon::now()->toDateTimeString();
        $estudiante->foto='null';
        $estudiante->estado=true;
        $estudiante->save();
        \Flash::success("Se ha <strong>Registrado</strong> un Estudiante</strong> de forma exitosa!");
        return redirect('estudiante');
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
        $estudiante = Persona::find($id);
        return view('crud.Persona.Estudiante.edit',compact('estudiante'));
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
            'apellidoPaterno'=>'required',
        ]);
        $estudiante = Persona::findOrFail($id);
        $estudiante->update($request->all());
        \Flash::success("Se ha <strong>Actualizado</strong> los datos de =><strong>".$estudiante->nombre."</strong> de forma exitosa!");
        return redirect('estudiante');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Persona::findOrFail($id);
        Persona::destroy($id);
        Estudiante::destroy($id);
        \Flash::success("Se ha <strong>Eliminado</strong> al Estudiante =><strong>".$estudiante->nombre."</strong> de forma exitosa!");
        return redirect('estudiante');
    }
}
