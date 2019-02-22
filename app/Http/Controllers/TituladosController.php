<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\Carrera;
use App\Estudiante;
use App\Persona;
use App\NivelAcademico;
use App\Inscribe;


class TituladosController extends Controller
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
        $titulados = DB::table('inscribe as i')
            ->join('estudiante as e', 'e.id', '=', 'i.id_Estudiante')
            ->join('carrera as c', 'c.id', '=', 'i.id_Carrera')
            ->join('persona as p', 'p.id', '=', 'e.id')
            ->join('nivel_academico as n', 'n.id', '=', 'c.id_nivel')
            ->select('i.id as id','p.nombre as nombre','p.apellidoPaterno as apellidoP','p.apellidoMaterno as apellidoM','c.nombre as carrera','n.nombre as nivel')->get();

        return view('crud.titulado.index',compact('titulados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles = NivelAcademico::pluck('nombre','id');
        $persona = DB::table('persona as p')
            ->join('estudiante as e', 'e.id', '=', 'p.id')
            ->join('inscribe as i', 'i.id_Estudiante', '=', 'e.id')
            ->join('carrera as c', 'c.id', '=', 'i.id_Carrera')
            ->select('p.*')->get();


        return view('crud.titulado.create',compact('niveles','persona'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
