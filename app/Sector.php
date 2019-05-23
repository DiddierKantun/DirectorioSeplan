<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;

class Sector extends Model
{
    protected $table = 'sector';

    protected $primaryKey = 'id_sector';

    public $timestamps = false;

    protected $fialleble = [
        'nombre_sector',
        'estatus'
    ];

    public function sectores()
    {
        return $this->hasMany('DirectorioSeplan\Dependencia', 'id_sector');
    }

    protected $guardaed = [];

    public static function estatusactivo(){

        return Sector::where('estatus', '=', 1)->get();
    }

    public static function estatusinactivo()
    {

        return Sector::where('estatus', '=', 0)->get();
    }

    public static function savesector(Request $request){

        $request->validate([
            'nombre' => 'required',
        ]);

        $newSector = new Sector;
        $newSector->nombre_sector = $request->input('nombre');
        $newSector->estatus = 1;
        $newSector->save();

        return Session::flash('message', 'Sector creado exitosamente');
    }

    public static function updatesector( Request $request, Sector $sector)
    {

        $request->validate([
            'nombre' => 'required',
        ]);

        $sect = Sector::findOrFail($sector->id_sector);
        $sect->nombre_sector = $request->input('nombre');
        $sect->estatus = 1;
        $sect->save();

        return Session::flash('message', 'Sector actualizado correctamente');
    }

    public static function deletesector( Sector $sector)
    {

        $sect = Sector::findOrFail($sector->id_sector);
        $sect->estatus = 0;
        $sect->save();

        return Session::flash('message', 'Sector eliminado exitosamente');
    }

    public static function updatestatus(Sector $sector)
    {
        $sect = Sector::findOrFail($sector->id_sector);
        $sect->estatus = 1;
        $sect->save();

        return Session::flash('message', 'Sector agregado nuevamente');
    }

    public static function showdependencia(){

        return Sector::join('dependencia', 'dependencia.id_sector', 'sector.id_sector')->where('dependencia.estatus', '=', 1)->get();
    }
}
