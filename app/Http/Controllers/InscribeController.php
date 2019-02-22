<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use App\Estudiante;
use App\Carrera;
use App\CarreraOfertada;
use App\Inscribe;
use App\NivelAcademico;

class InscribeController extends Controller
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
        $inscribes = DB::table('inscribe as i')
                            ->join('estudiante as e', 'e.id', '=', 'i.id_Estudiante')
                            ->join('persona as p', 'p.id', '=', 'e.id')
                            ->join('carrera_ofertada as co','co.id','=','i.id_Carrera')
                            ->join('carrera as c','c.id', '=', 'co.idCarrera')
                            ->select('i.*','p.nombre as EN','p.apellidoPaterno as EAP','p.apellidoMaterno as EAM','c.nombre as carrera')->get();
        //->paginate(1);
        //return view('estudiante.index',['estudiantes'=>$estudiantes]);
        return view('crud.inscribe.index',compact('inscribes'));
    }

    /**
     * Show the form fo
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$carreras = Carrera::pluck('nombre','id');
        //$carreras = CarreraOfertada::join('carrera as c','c.id','=','idCarrera')
        $carreras = DB::table('carrera_ofertada as co')
                    ->join('carrera as c','c.id','=','co.idCarrera')
                    ->pluck('c.nombre','c.id');
        /*$inscribes = Inscribe::join('carrera as c','c.id','id_carrera')
                    ->where('c.id','=',1)
                    ->select('id_estudiante')->get();*/
        $inscribes = Inscribe::select('id_Estudiante')->get();
        $estudiantesParcial=DB::table('estudiante as e')
            ->join('persona as p', 'p.id', '=', 'e.id')
            ->whereIn('p.id',$inscribes)
            ->select('p.nombre','p.apellidoPaterno as apellidoP','p.apellidoMaterno as apellidoM','p.id')->get();

        $estudiantes=[]; $i=0;
        foreach ($estudiantesParcial as $o1){
            $estudiantes[$o1->id]=$o1->nombre." ".$o1->apellidoP." ".$o1->apellidoM;
            $i=$i+1;
        }
        //$estudiantes = Estudiante::pluck('nombre_completo','id');
        return view('crud.inscribe.create',compact('carreras','estudiantes'));
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
            'id_Estudiante'=>'required',
            'id_Carrera'=>'required',
            'gestion_de_registro'=>'required',
        ]);

        $Lista=$request->id_Estudiante;
        $a=0;$c=0;
        foreach($Lista as $L){
            $inscribe= new Inscribe($request->all());
            $inscribe->id_Estudiante=$L;
            ///////////////////////////////////////////////////////
            $estudiante = Estudiante::findOrFail($inscribe->id_Estudiante);
            $persona = Persona::findOrFail($estudiante->id);
            $carrera = Carrera::findOrFail($inscribe->id_Carrera);
            $co = CarreraOfertada::where('idCarrera','=',$carrera->id)->orderBy('id','desc')->first();
            $nivel = NivelAcademico::findOrFail($carrera->id_nivel);
            $A=$carrera->sigla;
            $B=$nivel->sigla[1];
            $C=$request->gestion_de_registro;
            $D=$persona->ci;
            $inscribe->registro=$A.'-'.$B.$C.$D;
            ///////////////////////////////////////////////////////
            $inscribe->id_Carrera=$co->id;
            ///////////////////////////////////////////////////////
            $inscribe->titulado=true;
            $inscribe->fechaInscripcion=null;
            $x = Inscribe::where([  ['id_Carrera','=',$inscribe->id_Carrera],
                                    ['id_Estudiante','=',$inscribe->id_Estudiante],
                                ])->get();
            if($x->count()==0){
                $inscribe->save();
                $c=$c+1;
            }else{
                $a=$x->count();
            }
        }
        if($c>0){
            \Flash::success("Se ha <strong>Registrado</strong> una Inscripción de forma exitosa!");
            return redirect('inscribe');
        }else{
            \Flash::success("No se <strong>Registro</strong> una Inscripción, porque ya existe!");
            return redirect('inscribe');
        }
        /*
        $inscribe= new Inscribe($request->all());
        $result = DB::table('inscribe as t')
        ->join('estudiante as e','e.id','t.id_estudiante')
        ->join('carrera as c','c.id','t.id_carrera')
        ->where('e.id','=',$inscribe->id_estudiante)
        ->where('c.id','=',$inscribe->id_carrera)
        ->get();
        //dd($result->isEmpty());
        //dd($result->count());
        //dd(count($result));
        if($result->isEmpty()){
            $inscribe->save();
            \Flash::success("Se ha <strong>Registrado</strong> un Nuevo Titulado de forma exitosa!");
            return redirect('inscribe');
        }
        \Flash::warning("Ya esta Inscrito...");
        $carreras = Carrera::pluck('nombre','id');
        $estudiantes = Estudiante::pluck('nombre','id');
        return view('crud.inscribe.create',compact('carreras','estudiantes'));*/
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
        $carreras = Carrera::pluck('nombre','id');
        /*$inscribes = Inscribe::join('carrera as c','c.id','id_carrera')
                    ->where('c.id','=',1)
                    ->select('id_estudiante')->get();*/
        $inscribes = Inscribe::select('id_Estudiante')->get();
        $estudiantesParcial=DB::table('estudiante as e')
            ->join('persona as p','p.id','=','e.id')
            ->whereNotIn('e.id',$inscribes)
            ->select('p.nombre','p.apellidoPaterno as apellidoP','p.apellidoMaterno as apellidoM','p.id')->get();

        $estudiantes=[]; $i=0;
        foreach ($estudiantesParcial as $o1){

            $estudiantes[$o1->id]=$o1->nombre." ".$o1->apellidoP." ".$o1->apellidoM;

            $i=$i+1;
        }
        $inscribe = Inscribe::find($id);
        return view('crud.inscribe.edit',compact('inscribe','carreras','estudiantes'));
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
            'id_Estudiante'=>'required',
            'id_Carrera'=>'required',
            'gestion_de_registro'=>'required',
        ]);
        $inscribe = Inscribe::findOrFail($id);
        $inscribe->update($request->all());
        \Flash::success("Se ha <strong>Actualizado</strong> una Inscripción de forma exitosa!");
        return redirect('inscribe');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inscribe = Inscribe::findOrFail($id);
        Inscribe::destroy($id);
        \Flash::success("Se ha <strong>Eliminado</strong> una Inscripción de forma exitosa!");
        return redirect('inscribe');
    }
}
