<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use App\Mensualidad;
use App\User;
use App\Promocion;


class MensualidadController extends Controller
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
        $mensualidades = DB::table('mensualidad as m')
            ->join('users as u', 'u.id', '=', 'm.id_usuario')
            ->join('promocion as p', 'p.id', '=', 'm.id_promocion')
            ->select('m.*','u.nombres as UN','u.apellidos as UA','p.descripcion as PD')->get();
        //->paginate(1);
        //return view('estudiante.index',['estudiantes'=>$estudiantes]);
        return view('crud.mensualidad.index',compact('mensualidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socios = User::where('tipo','=',2)->pluck('nombres','id');
        $promociones = Promocion::pluck('descripcion','id');
        return view('crud.mensualidad.create',compact('socios','promociones'));
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
            'fecha_inicio'=>'required',
            'fecha_fin'=>'required',
            'monto'=>'required|numeric',
            'id_promocion'=>'required',
            'id_usuario'=>'required',
        ]);

        $mensualidad= new Mensualidad($request->all());
        $mensualidad->save();
        \Flash::success("Se ha <strong>Registrado</strong> la Mensualidad N° =><strong> ".$mensualidad->id."</strong> de forma exitosa!");
        return redirect('mensualidad');
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
        $promociones = Promocion::pluck('descripcion','id');
        $mensualidad = Mensualidad::find($id);
        return view('crud.mensualidad.edit',compact('mensualidad','socios','promociones'));
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
            'fecha_inicio'=>'required',
            'fecha_fin'=>'required',
            'monto'=>'required|numeric',
            'id_promocion'=>'required',
            'id_usuario'=>'required',
        ]);
        $mensualidad = Mensualidad::findOrFail($id);
        $mensualidad->update($request->all());
        \Flash::success("Se ha <strong>Actualizado</strong> la Mensualidad N° =><strong> ".$mensualidad->id."</strong> de forma exitosa!");
        return redirect('mensualidad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensualidad = Mensualidad::findOrFail($id);
        Mensualidad::destroy($id);
        \Flash::success("Se ha <strong>Eliminado</strong> la Mensualidad N° =><strong> ".$mensualidad->id."</strong> de forma exitosa!");
        return redirect('mensualidad');
    }
}
