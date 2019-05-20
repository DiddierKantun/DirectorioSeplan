<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Perfil;
use Illuminate\Http\Request;
use Session;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::usuariosactivo();
        $usua = Usuario::usuariosinactivo();
        return view('Usuario.usuario', compact('usuarios', 'usua'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfil = Usuario::perfiles();
        return view("Usuario.crearusuario", compact('perfil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Usuario::saveusuario($request);
        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $usua = Usuario::showusuarios($usuario);
        $perfil = Usuario::showperfiwherenombre($usua);
        return view('Usuario.editarusuario', compact('usua', 'perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        Usuario::updateusuario($request,$usuario);
        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        Usuario::deleteusuario($usuario);
        return redirect()->route('usuario.index');

    }

    public function updatestatus(Usuario $usuario)
    {
        Usuario::updatestatus($usuario);
        return redirect()->route('usuario.index');
    }
}
