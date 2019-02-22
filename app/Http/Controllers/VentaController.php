<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use App\Venta;
use App\Producto;


class VentaController extends Controller
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
        $ventas = DB::table('venta as v')
            ->join('producto as p', 'p.id', '=', 'v.id_producto')
            ->select('v.*','p.nombre')->get();
        //->paginate(1);
        //return view('estudiante.index',['estudiantes'=>$estudiantes]);
        return view('crud.venta.index',compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::pluck('nombre','id');
        return view('crud.venta.create',compact('productos'));
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
                'cantidad'=>'required|numeric',
                'fecha'=>'required',
                'precio'=>'required|numeric',
                'id_producto'=>'required',
        ]);

        $venta= new Venta($request->all());
        $venta->save();
        \Flash::success("Se ha <strong>Registrado</strong> la Venta N° =><strong> ".$venta->nombre."</strong> de forma exitosa!");
        return redirect('venta');
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
        $productos = Producto::pluck('nombre','id');
        $venta = Venta::find($id);
        return view('crud.venta.edit',compact('productos','venta'));
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
                'cantidad'=>'required|numeric',
                'fecha'=>'required',
                'precio'=>'required|numeric',
                'id_producto'=>'required',
        ]);
        $venta = Venta::findOrFail($id);
        $venta->update($request->all());
        \Flash::success("Se ha <strong>Actualizado</strong> la Venta N° =><strong> ".$venta->id."</strong> de forma exitosa!");
        return redirect('venta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        Venta::destroy($id);
        \Flash::success("Se ha <strong>Eliminado</strong> la Venta N° =><strong> ".$venta->id."</strong> de forma exitosa!");
        return redirect('venta');
    }
}
