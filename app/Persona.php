<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;

class Persona extends Model
{
    protected $table = 'persona';

    protected $primaryKey = 'id_persona';

    public $timestamps = false;

    public function personas()
    {
        return $this->belongsTo('DirectorioSeplan\enlace', 'id_tipoenlace');
        return $this->belongsTo( 'DirectorioSeplan\dependencia', 'id_dependencia');
    }

    protected $fialleble = [
        'cargo_persona',
        'titulo_persona',
        'nombre_persona',
        'apepat_persona',
        'apemat_persona',
        'correo_institucional',
        'correo_personal',
        'tel_institucional',
        'tel_personal',
        'fecha_nac',
        'notas',
        'id_dependencia',
        'id_tipoenlace',
        'estatus'
    ];

    protected $guardaed = [];

    public static function personaactiva(){

        return Persona::join('tipo_enlace', 'persona.id_tipoenlace', 'tipo_enlace.id_tipoenlace')->join('dependencia', 'persona.id_dependencia', 'dependencia.id_dependencia')->where('persona.estatus', '=', 1)->get();
    }

    public static function personainactiva(){

        return Persona::join('tipo_enlace', 'persona.id_tipoenlace', 'tipo_enlace.id_tipoenlace')->join('dependencia', 'persona.id_dependencia', 'dependencia.id_dependencia')->where('persona.estatus', '=', 0)->get();
    }

    public static function showenlace(){

        return Enlace::where('estatus', '=', 1)->get();
    }

    public static function showdependencias(){

        return Dependencia::where('estatus', '=', 1)->get();
    }

    public static function savepersona( Request $request){

        $request->validate([
            'cargo' => 'required',
            'titulo' => 'required',
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'correoIns' => 'required',
            'correoPer' => 'required',
            'telIns' => 'required',
            'telPer' => 'required',
            'fechaNac' => 'required',
            //'notas' => 'required',
            'dependencia' => 'required',
            'tipoenlace' => 'required',
        ]);

        $newPersona = new Persona;
        $newPersona->cargo_persona = $request->input('cargo');
        $newPersona->titulo_persona = $request->input('titulo');
        $newPersona->nombre_persona = $request->input('nombre');
        $newPersona->apepat_persona = $request->input('apellidoP');
        $newPersona->apemat_persona = $request->input('apellidoM');
        $newPersona->correo_institucional = $request->input('correoIns');
        $newPersona->correo_personal = $request->input('correoPer');
        $newPersona->tel_institucional = $request->input('telIns');
        $newPersona->tel_personal = $request->input('telPer');
        $newPersona->fecha_nac = $request->input('fechaNac');
        $newPersona->notas = $request->input('notas');
        $newPersona->id_dependencia = $request->input('dependencia');
        $newPersona->id_tipoenlace = $request->input('tipoenlace');
        $newPersona->estatus = 1;
        $newPersona->save();

        return Session::flash('message', 'Persona creada exitosamente');
    }

    public static function showpersona(Persona $persona){

        return Persona::join('dependencia', 'persona.id_dependencia', 'dependencia.id_dependencia')->join('tipo_enlace', 'persona.id_tipoenlace', 'tipo_enlace.id_tipoenlace')->where('persona.estatus', '=', 1)->findOrFail($persona->id_persona);
    }

    public static function showenlacewherenombre($perso){

        return Enlace::where('estatus', '=', 1)->where('nombre_enlace', '!=', $perso->nombre_enlace)->get();
    }

    public static function showdependenciawherenombre($perso){

        return Dependencia::where('estatus', '=', 1)->where('nombre_dependencia', '!=', $perso->nombre_dependencia)->get();
    }

    public static function updatepersona(Request $request, $id_persona){

        $request->validate([
            'cargo' => 'required',
            'titulo' => 'required',
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'correoIns' => 'required',
            'correoPer' => 'required',
            'telIns' => 'required',
            'telPer' => 'required',
            'fechaNac' => 'required',
            //'notas' => 'required',
            'dependencia' => 'required',
            'tipoenlace' => 'required',
        ]);

        $persona = Persona::findOrFail($id_persona);
        $persona->cargo_persona = $request->input('cargo');
        $persona->titulo_persona = $request->input('titulo');
        $persona->nombre_persona = $request->input('nombre');
        $persona->apepat_persona = $request->input('apellidoP');
        $persona->apemat_persona = $request->input('apellidoM');
        $persona->correo_institucional = $request->input('correoIns');
        $persona->correo_personal = $request->input('correoPer');
        $persona->tel_institucional = $request->input('telIns');
        $persona->tel_personal = $request->input('telPer');
        $persona->fecha_nac = $request->input('fechaNac');
        $persona->notas = $request->input('notas');
        $persona->id_dependencia = $request->input('dependencia');
        $persona->id_tipoenlace = $request->input('tipoenlace');
        $persona->estatus = 1;
        $persona->save();

        return Session::flash('message', 'Persona modificada correctamente');
    }

    public static function deletepersona($id_persona){

        $per = Persona::findOrFail($id_persona);
        $per->estatus = 0;
        $per->save();

        return Session::flash('message', 'Persona eliminada correctamente');
    }

    public static function updatestatus($id_persona)
    {
        $per = Persona::findOrFail($id_persona);
        $per->estatus = 1;
        $per->save();

        return Session::flash('message', 'Persona agregada nuevamente');
    }

    public static function showdependenciapersona($dep){

        return Persona::join('dependencia', 'persona.id_dependencia', 'dependencia.id_dependencia')->where('persona.id_dependencia', '=', $dep->id_dependencia)->where('persona.estatus', '=', 1)->get();
    }
}
