<?php

namespace App\Http\Controllers;

use App\CarreraOfertada;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use App\Titulo;
use App\Estudiante;
use App\Persona;
use App\fpdf\FPDF;
use App\Inscribe;
use Carbon\Carbon;



class TituloController extends Controller
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
       $titulos = DB::table('titulo as t')
            ->join('estudiante as e', 'e.id', '=', 't.idSolicitante')
            ->join('persona as p', 'p.id', '=', 'e.id')
            ->select('t.*','p.nombre as N','p.apellidoPaterno as AP','p.apellidoMaterno as AM')->get();
        return view('crud.Titulos.index',compact('titulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = Titulo::pluck('numeracion','fechaEmision','idSolicitante','costo','recogedor','fechaEntrega');
        $estudiantes = Persona::pluck('nombre','apellidoPaterno','apellidoMaterno','id');
        return view('crud.Titulos.create',compact('titulo','estudiantes'));
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
            'numeracion'=>'required',
            'fechaEmision'=>'required',
        ]);
        $titulo= new Titulo($request->all());
        $titulo->save();
        \Flash::success("Se ha <strong>Registrado</strong> un Titulo de forma exitosa!");
        return redirect('Titulo');
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

    public function imprimirTitulo($id){
        $inscribe=Inscribe::findOrFail($id);
        $idEstudiante=$inscribe->id_Estudiante;$idCarreraO=$inscribe->id_Carrera;
        $datos= DB::table('estudiante as e')
            ->join('persona as p', 'p.id', '=', 'e.id')
            ->join('inscribe as i', 'i.id_Estudiante', '=', 'e.id')
            ->join('carrera_ofertada as co', 'co.id', '=', 'i.id_Carrera')
            ->join('carrera as c', 'c.id', '=', 'co.idCarrera')
            ->join('nivel_academico as n', 'n.id', '=', 'c.id_nivel')
            ->where('e.id',$idEstudiante)
            ->where('co.id',$idCarreraO)
            ->select('i.registro as registro','p.nombre as nombre','p.apellidoPaterno as apellidoP','p.apellidoMaterno as apellidoM','p.fechaNacimiento as fechaN','p.ciudad as lugarN','p.ci as ci','c.id as idCarrera','c.nombre as carrera','c.horas as horas','n.id as idN','n.sigla as siglaN','n.nombre as nombreN')->get();

        if($datos->count()==0){
            \Flash::warning("NO <strong>se encontro los datos del estudiante</strong> en la base de Datos!");
            return redirect('inscribe');

        }

        $firmantes= DB::table('firmante as f')
            ->join('nivel_academico as n', 'n.id', '=', 'f.id_nivel')
            ->join('cargo as c', 'c.id', '=', 'f.id_cargo')
            ->join('autoridad as a', 'a.id_cargo', '=', 'c.id')
            ->where('n.id',$datos[0]->idN)
            ->select('a.rango as rango','a.nombres as nombre','a.apellidos as apellidos','c.nombre as cargo')->get();

        if($firmantes->count()==0){
            \Flash::warning("NO <strong>existen firmantes</strong> registrados para este titulo!");
            return redirect('inscribe');

        }




        if($datos[0]->siglaN!="CC"){

            $pdf = new FPDF('p','mm','legal');
            $pdf->AddPage();

            $pdf->AddFont('gargoylessi','','GARGOYL.php');
            $pdf->AddFont('MonotypeCorsiva','','Monotype Corsiva.php');

            $pdf->HeaderTitulo($datos[0]->registro,$datos[0]->siglaN);


            $fechaPrueba=date('d,m,Y');
            $nombre=$datos[0]->nombre." ".$datos[0]->apellidoP." ".$datos[0]->apellidoM;
            $fechaNacimiento=date('d,m,Y',strtotime($datos[0]->fechaN));

            $pdf->BodyTitulo($datos[0]->nombreN,$datos[0]->carrera,$nombre,$fechaNacimiento,$datos[0]->lugarN,$datos[0]->ci);

            $pdf->FooterTitulo($fechaPrueba,$firmantes);

            $consulta=Titulo::where([  ['idCarreraO','=',$idCarreraO],
                ['idSolicitante','=',$idEstudiante],
            ])->get();
            if(COUNT($consulta)==0){
                $titulo=new Titulo();

                $titulo->fechaEmision=Carbon::now()->toDateTimeString();
                $titulo->idNivel=$datos[0]->idN;
                $titulo->idCarreraO=$idCarreraO;
                $titulo->idSolicitante=$idEstudiante;
                $titulo->ciRecogedor=null;
                $titulo->nameRecogedor=null;
                $titulo->fechaEntrega=null;

                $titulo->save();

            }

            $pdf->Output();

        }else{

            ////El documento es un certificado
            ///
            $datosExtras=DB::table('carrera_ofertada as co')
                ->where('co.idCarrera',$datos[0]->idCarrera)
                ->select('co.*')->get();

            if($datosExtras->count()==0){
                \Flash::warning("Se requiere <strong>que oferte</strong> el curso corto!");
                return redirect('inscribe');

            }

            $pdf = new FPDF('L','mm','letter');
            $pdf->AddFont('gargoylessi','','GARGOYL.php');
            $pdf->AddFont('MonotypeCorsiva','B','Monotype Corsiva.php');
            $pdf->AddPage();

            $fechaI=date('d,m,Y',strtotime($datosExtras[0]->fechaInicio));
            $fechaF=date('d,m,Y',strtotime($datosExtras[0]->fechaConclusion));
            $nombre=$datos[0]->nombre." ".$datos[0]->apellidoP." ".$datos[0]->apellidoM;

            $pdf->RellenarDatosCertificado($nombre,$datos[0]->carrera,$fechaI,$fechaF,$datos[0]->horas,$firmantes);

            $consulta=Titulo::where([  ['idCarreraO','=',$idCarreraO],
                ['idSolicitante','=',$idEstudiante],
            ])->get();
            if(COUNT($consulta)==0){
                $titulo=new Titulo();

                $titulo->fechaEmision=Carbon::now()->toDateTimeString();
                $titulo->idNivel=$datos[0]->idN;
                $titulo->idCarreraO=$idCarreraO;
                $titulo->idSolicitante=$idEstudiante;
                $titulo->ciRecogedor=null;
                $titulo->nameRecogedor=null;
                $titulo->fechaEntrega=null;

                $titulo->save();

            }

            $pdf->Output();

        }


        exit();

    }


}
