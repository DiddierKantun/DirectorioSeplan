<?php

namespace App\Http\Controllers;
session_start();
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([

            'correo' => 'required',
            'contra' => 'required',

        ]);

        $correo_usuario = $request->input('correo');
        $contrasenia = $request->input('contra');

        $usuarios = Usuario::join('perfil', 'usuario.id_perfil', 'perfil.id_perfil')->where('usuario.correo_usuario', '=', $correo_usuario)->get();
        $passbd = Crypt::decrypt($usuarios->first()->contrasenia);

        if($usuarios->count()>=1){


            if ($usuarios->first()->estatus == 1) {

                if( $usuarios->first()->correo_usuario == $correo_usuario){

                    if ($contrasenia == $passbd) {

                        if ($usuarios->first()->id_perfil == 1) {

                            $_SESSION['nombre'] = $usuarios->first()->nombre_usuario;
                            $_SESSION['apepat'] = $usuarios->first()->apepat_usuario;
                            $_SESSION['apemat'] = $usuarios->first()->apemat_usuario;
                            $_SESSION['perfil'] = $usuarios->first()->nombre_perfil;

                            return redirect()->route('welcome');
                        } else if ($usuarios->first()->id_perfil == 2) {

                            $_SESSION['nombre'] = $usuarios->first()->nombre_usuario;
                            $_SESSION['apepat'] = $usuarios->first()->apepat_usuario;
                            $_SESSION['apemat'] = $usuarios->first()->apemat_usuario;
                            $_SESSION['perfil'] = $usuarios->first()->nombre_perfil;

                            return redirect()->route('directorio.index');
                        } else {

                            return view('login');
                        }
                    } else {

                        Session::flash('message', 'Por favor verifique su contraseña');
                        return view('login');
                    }
                }else{

                    Session::flash('message', 'Por favor verifique su correo electronico');
                    return view('login');

                }

            }else{

                Session::flash('message', 'El usuario ingresado no existe');
                return view('login');
            }
        }
        else{

            Session::flash('message', 'Se a producido un error');
            return view('login');
        }
    }

    public function logout()
    {
        session_destroy();
        return view('login');
    }
}
