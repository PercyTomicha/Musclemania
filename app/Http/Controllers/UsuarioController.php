<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsuarioController extends Controller
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
            $usuarios = User::orderby('id','asc')->get();
            return view('crud.usuario.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.usuario.create');
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
            'nombres'=>'required|max:25',
            'apellidos'=>'required|max:30',
            'telefono'=>'required|numeric',
            'fecha_nacimiento'=>'required',
            'tipo'=>'required',
            'estado'=>'required',
            'email'=>'required|email|unique:users'
        ]);
        
        $usuario = new User($request->all());
        $usuario->password = Hash::make($usuario->telefono);
        $usuario->save();
        \Flash::success("Se ha <strong>Registrado</strong> el Usuario =><strong>".$usuario->nombres." ".$usuario->apellidos."</strong> de forma exitosa!");
        return redirect('usuario');
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
        $usuario = User::find($id);
        return view('crud.usuario.edit',compact('usuario'));
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
            'nombres'=>'required|max:25',
            'apellidos'=>'required|max:30',
            'telefono'=>'required|numeric',
            'fecha_nacimiento'=>'required',
            'tipo'=>'required',
            'estado'=>'required',
        ]);
        $usuario = User::findOrFail($id);
        $usuario->update($request->all());
        \Flash::success("Se ha <strong>Actualizado</strong> el Usuario =><strong>".$usuario->nombres." ".$usuario->apellidos."</strong> de forma exitosa!");
        return redirect('usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        User::destroy($id);
        \Flash::success("Se ha <strong>Eliminado</strong> el Usuario =><strong>".$usuario->nombres." ".$usuario->apellidos."</strong> de forma exitosa!");
        return redirect('usuario');
    }
}
