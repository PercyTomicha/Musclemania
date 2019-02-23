<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use App\Asistencia;
use App\User;


class AsistenciaController extends Controller
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
        $asistencias = DB::table('asistencia as a')
            ->join('users as u', 'u.id', '=', 'a.id_usuario')
            ->select('a.*','u.nombres as UN','u.apellidos as UA')->get();
        //->paginate(1);
        //return view('estudiante.index',['estudiantes'=>$estudiantes]);
        return view('crud.asistencia.index',compact('asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socios = User::where('tipo','=',2)->pluck('nombres','id');
        return view('crud.asistencia.create',compact('socios'));
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
            'fecha'=>'required',
            'hora'=>'required|numeric',
            'presencia'=>'required|numeric',
            'id_usuario'=>'required',
        ]);

        $asistencia= new Asistencia($request->all());
        $asistencia->save();
        \Flash::success("Se ha <strong>Registrado</strong> la Asistencia N° =><strong> ".$asistencia->id."</strong> de forma exitosa!");
        return redirect('asistencia');
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
        $socios = User::where('tipo','=',2)->pluck('nombres','id');
        $asistencia = Asistencia::find($id);
        return view('crud.asistencia.edit',compact('socios','asistencia'));
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
            'fecha'=>'required',
            'hora'=>'required|numeric',
            'presencia'=>'required|numeric',
            'id_usuario'=>'required',
        ]);
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->update($request->all());
        \Flash::success("Se ha <strong>Actualizado</strong> la Asistencia N° =><strong> ".$asistencia->id."</strong> de forma exitosa!");
        return redirect('asistencia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        Asistencia::destroy($id);
        \Flash::success("Se ha <strong>Eliminado</strong> la Asistencia N° =><strong> ".$asistencia->id."</strong> de forma exitosa!");
        return redirect('asistencia');
    }
}
