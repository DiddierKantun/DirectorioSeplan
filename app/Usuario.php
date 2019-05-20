<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Session;

class Usuario extends Model
{
    protected $table = 'usuario';

    protected $primaryKey = 'id_usuario';

    public $timestamps = false;

    protected $fialleble = [
        'nombre_usuario',
        'apepat_usuario',
        'apemat_usuario',
        'correo_usuario',
        'contrasenia',
        'id_perfil',
        'estatus'
    ];

    public function usuarios()
    {
        return $this->belongsTo('DirectorioSeplan\perfil', 'id_perfil');
    }

    public static function usuariosactivo(){

        return Usuario::join('perfil', 'usuario.id_perfil', 'perfil.id_perfil')->where('usuario.estatus', '=', 1)->get();
    }
    
    public static function usuariosinactivo(){

        return Usuario::join('perfil', 'usuario.id_perfil', 'perfil.id_perfil')->where('usuario.estatus', '=', 0)->get();
    }

    public static function perfiles(){

        return Perfil::all();
    }

    public static function saveusuario(Request $request){

        $request->validate([
            'nombre' => 'required',
            'apePat' => 'required',
            'apeMat' => 'required',
            'correo' => 'required',
            'contra' => 'required',
            'perfil' => 'required',
        ]);

        $newUsuario = new Usuario;
        $newUsuario->nombre_usuario = $request->input('nombre');
        $newUsuario->apepat_usuario = $request->input('apePat');
        $newUsuario->apemat_usuario = $request->input('apeMat');
        $newUsuario->correo_usuario = $request->input('correo');
        $newUsuario->contrasenia = Crypt::encrypt($request->input('contra'));
        $newUsuario->id_perfil = $request->input('perfil');
        $newUsuario->estatus = 1;
        $newUsuario->save();

        return Session::flash('message', 'Usuario creado exitosamente');
    }

    public static function showusuarios( $usuario){

        return Usuario::join('perfil', 'usuario.id_perfil', 'perfil.id_perfil')->where('usuario.estatus', '=', 1)->findOrFail($usuario->id_usuario);
    }

    public static function showperfiwherenombre( $usua){

        return Perfil::where('nombre_perfil', '!=', $usua->nombre_perfil)->get();
    }

    public static function updateusuario(Request $request, Usuario $usuario){

        $request->validate([
            'nombre' => 'required',
            'apePat' => 'required',
            'apeMat' => 'required',
            'correo' => 'required',
            'contra' => 'required',
            'perfil' => 'required',
        ]);

        $us = Usuario::findOrFail($usuario->id_usuario);
        $us->nombre_usuario = $request->input('nombre');
        $us->apepat_usuario = $request->input('apePat');
        $us->apemat_usuario = $request->input('apeMat');
        $us->correo_usuario = $request->input('correo');
        $us->contrasenia = $request->input('contra');
        $us->id_perfil = $request->input('perfil');
        $us->estatus = 1;
        $us->save();
        return Session::flash('message', 'Usuario modificado correctamente');
    }

    public static function deleteusuario(Usuario $usuario){

        $usu = Usuario::findOrFail($usuario->id_usuario);
        $usu->estatus = 0;
        $usu->save();
        return Session::flash('message', 'Usuario elminado exitosamente');
    }

    public static function updatestatus(Usuario $usuario)
    {
        $usu = Usuario::findOrFail($usuario->id_usuario);
        $usu->estatus = 1;
        $usu->save();
        return Session::flash('message', 'Usuario agregado nuevamente');
    }
}
