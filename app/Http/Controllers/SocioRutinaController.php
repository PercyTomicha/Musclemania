<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use App\SocioRutina;
use App\User;
use App\Rutina;


class SocioRutinaController extends Controller
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
        $socio_rutinas = DB::table('socio_rutina as s')
            ->join('users as u', 'u.id', '=', 's.id_usuario')
            ->join('rutina as r', 'r.id', '=', 's.id_rutina')
            ->select('s.*','u.nombres as UN','u.apellidos as UA','r.nombre as RN','r.musculo as RM')->get();
        //->paginate(1);
        //return view('estudiante.index',['estudiantes'=>$estudiantes]);
        return view('crud.socio_rutina.index',compact('socio_rutinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socios = User::where('tipo','=',2)->pluck('nombres','id');
        $rutinas = Rutina::pluck('musculo','id');
        return view('crud.socio_rutina.create',compact('socios','rutinas'));
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
            'id_rutina'=>'required',
            'id_usuario'=>'required',
        ]);

        $socio_rutina= new SocioRutina($request->all());
        $socio_rutina->save();
        $rutina=Rutina::find($socio_rutina->id_rutina);
        \Flash::success("Se ha <strong>Registrado</strong> la Rutina de =><strong> ".$rutina->musculo."</strong> de forma exitosa!");
        return redirect('socio_rutina');
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
        $rutinas = Rutina::pluck('musculo','id');
        $socio_rutina = SocioRutina::find($id);
        return view('crud.socio_rutina.edit',compact('socio_rutina','socios','rutinas'));
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
            'id_rutina'=>'required',
            'id_usuario'=>'required',
        ]);
        $socio_rutina = SocioRutina::findOrFail($id);
        $socio_rutina->update($request->all());
        $rutina=Rutina::find($socio_rutina->id_rutina);
        \Flash::success("Se ha <strong>Actualizado</strong> la Rutina de =><strong> ".$rutina->musculo."</strong> de forma exitosa!");
        return redirect('socio_rutina');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socio_rutina = SocioRutina::findOrFail($id);
        SocioRutina::destroy($id);
        $rutina=Rutina::find($socio_rutina->id_rutina);
        \Flash::success("Se ha <strong>Eliminado</strong> la Rutina de =><strong> ".$rutina->musculo."</strong> de forma exitosa!");
        return redirect('socio_rutina');
    }
}
