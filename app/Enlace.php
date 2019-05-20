<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;

class Enlace extends Model
{
    protected $table = 'tipo_enlace';

    protected $primaryKey = 'id_tipoenlace';

    public $timestamps = false;

    protected $fialleble = [
        'nombre_enlace',
        'estatus'
    ];

    public function enlaces()
    {
        return $this->hasOne('DirectorioSeplan\Persona', 'id_tipoenlace');
    }

    protected $guardaed = [];

    public static function enlaceactivo(){

        return Enlace::where('estatus', '=', 1)->get();
    }

    public static function enlaceinactivo(){

        return Enlace::where('estatus', '=', 0)->get();
    }

    public static function saveenlace( Request $request){

        $newEnlace = new Enlace;
        $newEnlace->nombre_enlace = $request->input('nombre');
        $newEnlace->estatus = 1;
        $newEnlace->save();

        return Session::flash('message', 'Enlace creado exitosamente');
    }

    public static function updateenlace(Request $request, $id_enlace){

        $request->validate([
            'nombre' => 'required',
        ]);

        $enlac = Enlace::findOrFail($id_enlace);
        $enlac->nombre_enlace = $request->input('nombre');
        $enlac->estatus = 1;
        $enlac->save();

        return Session::flash('message', 'Enlace modificado exitosamente');
    }

    public static function deleteenlace( $id_enlace){

        $en = Enlace::findOrFail($id_enlace);
        $en->estatus = 0;
        $en->save();

        return Session::flash('message', 'Enlace eliminado exitosamente');
    }

    public static function updatestatus($id_enlace)
    {
        $en = Enlace::findOrFail($id_enlace);
        $en->estatus = 1;
        $en->save();

        return Session::flash('message', 'Enlace agregado nuevamente');
    }
}
