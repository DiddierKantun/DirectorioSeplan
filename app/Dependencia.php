<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;

class Dependencia extends Model
{
    protected $table = 'dependencia';

    protected $primaryKey = 'id_dependencia';

    public $timestamps = false;

    protected $fialleble = [
        'nombre_dependencia',
        'siglas_dependencia',
        'calle_num',
        'cruzamientos',
        'colonia',
        'cp',
        'referencias',
        'estado',
        'municipio',
        'ciudad',
        'id_sector',
        'estatus'
    ];

    public function dependencias()
    {
        return $this->belongsTo('DirectorioSeplan\sector', 'id_sector');
        return $this->hasMany( 'DirectorioSeplan\persona', 'id_dependencia');
    }

    public static function dependenciasactiva(){

        return Dependencia::join('sector', 'dependencia.id_sector', 'sector.id_sector')->where('dependencia.estatus', '=', 1)->get();
    }
    public static function dependenciainactiva(){

        return Dependencia::join('sector', 'dependencia.id_sector', 'sector.id_sector')->where('dependencia.estatus', '=', 0)->get();
    }
    public static function showsector(){

        return Sector::where('estatus', '=', 1)->get();
    }

    public static function savedependencia( Request $request){

        $request->validate([
            'siglas' => 'required',
            'nombre' => 'required',
            'calleNo' => 'required',
            'cruzamientos' => 'required',
            'colonia' => 'required',
            'codpostal' => 'required',
            'referencias' => 'required',
            'estado' => 'required',
            'municipio' => 'required',
            'ciudad' => 'required',
            'sector' => 'required',
        ]);

        $newDependencia = new Dependencia;
        $newDependencia->siglas_dependencia = $request->input('siglas');
        $newDependencia->nombre_dependencia = $request->input('nombre');
        $newDependencia->calle_num = $request->input('calleNo');
        $newDependencia->cruzamientos = $request->input('cruzamientos');
        $newDependencia->colonia = $request->input('colonia');
        $newDependencia->cp = $request->input('codpostal');
        $newDependencia->referencias = $request->input('referencias');
        $newDependencia->estado = $request->input('estado');
        $newDependencia->municipio = $request->input('municipio');
        $newDependencia->ciudad = $request->input('ciudad');
        $newDependencia->id_sector = $request->input('sector');
        $newDependencia->estatus = 1;
        $newDependencia->save();

        return Session::flash('message', 'Dependencia creada exitosamente');
    }

    public static function showdependencias( $id_dependencia){

        return Dependencia::join('sector', 'dependencia.id_sector', 'sector.id_sector')->where('dependencia.estatus', '=', 1)->findOrFail($id_dependencia);
    }

    public static function showsectorwherename($dependencia){

        return Sector::where('estatus', '=', 1)->where('nombre_sector', '!=', $dependencia->nombre_sector)->get();
    }

    public static function updatedependencia(Request $request, $id_dependencia){

        $request->validate([
            'siglas' => 'required',
            'nombre' => 'required',
            'calleNo' => 'required',
            'cruzamientos' => 'required',
            'colonia' => 'required',
            'codpostal' => 'required',
            'referencias' => 'required',
            'estado' => 'required',
            'municipio' => 'required',
            'ciudad' => 'required',
            'sector' => 'required',
        ]);

        $depen = Dependencia::findOrFail($id_dependencia);
        $depen->nombre_dependencia = $request->input('nombre');
        $depen->siglas_dependencia = $request->input('siglas');
        $depen->calle_num = $request->input('calleNo');
        $depen->cruzamientos = $request->input('cruzamientos');
        $depen->colonia = $request->input('colonia');
        $depen->cp = $request->input('codpostal');
        $depen->referencias = $request->input('referencias');
        $depen->estado = $request->input('estado');
        $depen->municipio = $request->input('municipio');
        $depen->ciudad = $request->input('ciudad');
        $depen->id_sector = $request->input('sector');
        $depen->estatus = 1;
        $depen->save();

        return Session::flash('message', 'Dependencia modificada correctamente');
    }
    
    public static function deletedependencia( $id_dependencia){

        $dep = Dependencia::findOrFail($id_dependencia);
        $dep->estatus = 0;
        $dep->save();

        return Session::flash('message', 'Dependencia eliminada exitosamente');
    }

    public static function updatestatus($id_dependencia)
    {
        $dep = Dependencia::findOrFail($id_dependencia);
        $dep->estatus = 1;
        $dep->save();

        return Session::flash('message', 'Dependencia agregada nuevamente');
    }

}
