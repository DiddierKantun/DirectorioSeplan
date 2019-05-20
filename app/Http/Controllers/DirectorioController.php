<?php

namespace App\Http\Controllers;
use App\Sector;
use App\Persona;

use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    public function index()
    {
        $dependencias = Sector::join('dependencia', 'dependencia.id_sector', 'sector.id_sector')->where('dependencia.estatus', '=', 1)->get();
        
        $cadena = '';
         foreach($dependencias as $dep){
            $cadena .= "<tr>
            <th>".$dep->id_dependencia."</th>
            <th>".$dep->nombre_sector."</th>
            <th>".$dep->siglas_dependencia."</th>                      
            <th>".$dep->nombre_dependencia."</th>
            <th>".$dep->calle_num." ".$dep->cruzamientos." ".$dep->colonia."</th>";

            $personas = Persona::join('dependencia', 'persona.id_dependencia', 'dependencia.id_dependencia')->where('persona.id_dependencia', '=', $dep->id_dependencia)->where('persona.estatus', '=', 1)->get();
            
            $filas = $personas->count();
            
            foreach ($personas as $per){
                $cadena .="<th>".$per->cargo_persona."</th>
                <th>".$per->titulo_persona."</th>
                <th>".$per->nombre_persona.' '.$per->apepat_persona. ' '. $per->apemat_persona ."</th>                
                <th>".$per->correo_institucional. "</th>
                <th>".$per->correo_personal."</th>
                <th>".$per->tel_institucional."</th>
                <th>".$per->tel_personal."</th>";
                 
            }
                        
            if ($filas == 0) {
                $cadena .= "<th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>";
                $cadena .= "<th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>";
                $cadena .= "<th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>";
            }

            if ($filas == 1){
                $cadena .= "<th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>";
                $cadena .= "<th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>";
            }

            if ($filas == 2) {               
                $cadena .= "<th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>";
            }

            $cadena .="<th></th>
            </tr>";
        }
        return view('Directorio.directorio', compact('cadena'));
    }
}
