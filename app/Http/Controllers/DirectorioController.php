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
            <td>".$dep->id_dependencia."</td>
            <td>".$dep->nombre_sector."</td>
            <td>".$dep->siglas_dependencia."</td>
            <td>".$dep->nombre_dependencia."</td>
            <td>".$dep->calle_num." ".$dep->cruzamientos." ".$dep->colonia."</td>";

            $personas = Persona::join('dependencia', 'persona.id_dependencia', 'dependencia.id_dependencia')->where('persona.id_dependencia', '=', $dep->id_dependencia)->where('persona.estatus', '=', 1)->get();

            $filas = $personas->count();

            foreach ($personas as $per){
                $cadena .="<td>".$per->cargo_persona."</td>
                <td>".$per->titulo_persona."</td>
                <td>".$per->nombre_persona.' '.$per->apepat_persona. ' '. $per->apemat_persona ."</td>
                <td>".$per->correo_institucional. "</td>
                <td>".$per->correo_personal."</td>
                <td>".$per->tel_institucional."</td>
                <td>".$per->tel_personal."</td>";

            }

            if ($filas == 0) {
                $cadena .= "<td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>";
                $cadena .= "<td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>";
                $cadena .= "<td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>";
            }

            if ($filas == 1){
                $cadena .= "<td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>";
                $cadena .= "<td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>";
            }

            if ($filas == 2) {
                $cadena .= "<td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>";
            }

            $cadena .="</tr>";
        }
        return view('Directorio.directorio', compact('cadena'));
    }
}
