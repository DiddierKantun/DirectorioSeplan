<?php

namespace App\Http\Controllers;
use App\Sector;
use App\Persona;
use App\Dependencia;

use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    public function excel(){
        $sector = Sector::estatusactivo();
        $dependencia = Dependencia::dependenciasactiva();

        $dependencias = Sector::showdependencia();
         
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=directorio.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        
        $cadena = '';
        echo '<table border="1">';
        echo "<thead>";
        echo '<tr role="row">';
        echo "<th>No.</th>";
        echo "<th>SECTOR</th>";
        echo "<th>SIGLAS</th>";
        echo "<th>DEPENDENCIA</th>";
        echo "<th>DIRECCION</th>";
        echo "<th>CARGO TITULAR</th>";
        echo "<th>TITULO TITULAR</th>";
        echo "<th>NOMBRE TITULAR</th>";
        echo "<th>CORREO INSTITUCIONAL</th>";
        echo "<th>CORREO PERSONAL</th>";
        echo "<th>TELEFONO INSTITUCIONAL</th>";
        echo "<th>TELEFONO PERSONAL</th>";
        echo "<th>CARGO ENLACE</th>";
        echo "<th>TITULO ENLACE</th>";
        echo "<th>NOMBRE ENLACE</th>";
        echo "<th>CORREO INSTITUCIONAL</th>";
        echo "<th>CORREO PERSONAL</th>";
        echo "<th>TELEFONO INSTITUCIONAL</th>";
        echo "<th>TELEFONO PERSONAL</th>";
        echo "<th>CARGO ENLACE</th>";
        echo "<th>TITULO ENLACE</th>";
        echo "<th>NOMBRE ENLACE</th>";
        echo "<th>CORREO INSTITUCIONAL</th>";
        echo "<th>CORREO PERSONAL</th>";
        echo "<th>TELEFONO INSTITUCIONAL</th>";
        echo "<th>TELEFONO PERSONAL</th>";
        echo "</tr>";
        echo "</thead>";
         foreach($dependencias as $dep){
            echo "<tr>";
             echo "<td>".$dep->id_dependencia."</td>";
             echo "<td>".$dep->nombre_sector."</td>";
             echo "<td>".$dep->siglas_dependencia."</td>";
             echo "<td>".$dep->nombre_dependencia."</td>";
             echo "<td>".$dep->calle_num." ".$dep->cruzamientos." ".$dep->colonia."</td>";

            $personas = Persona::showdependenciapersona($dep);

            $filas = $personas->count();

            foreach ($personas as $per){
                echo "<td>".$per->cargo_persona."</td>";
                echo "<td>".$per->titulo_persona."</td>";
                echo "<td>".$per->nombre_persona.' '.$per->apepat_persona. ' '. $per->apemat_persona ."</td>";
                echo "<td>".$per->correo_institucional. "</td>";
                echo "<td>".$per->correo_personal."</td>";
                echo "<td>".$per->tel_institucional."</td>";
                echo "<td>".$per->tel_personal."</td>";

            }

            if ($filas == 0) {
                echo"<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo"<td></td>";
                echo "<td></td>";
                echo  "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
            }

            if ($filas == 1){
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
            }

            if ($filas == 2) {
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
            }

            echo "</tr>";
        }
        echo "</table>";
        //return view('Directorio.directorio', compact('cadena','sector','dependencia'));
        //echo $cadena;
    }

    public function index()
    {
        $sector = Sector::estatusactivo();
        $dependencia = Dependencia::dependenciasactiva();

        $dependencias = Sector::showdependencia();

        $cadena = '';
         foreach($dependencias as $dep){
            $cadena .= "<tr>
            <td>".$dep->id_dependencia."</td>
            <td>".$dep->nombre_sector."</td>
            <td>".$dep->siglas_dependencia."</td>
            <td>".$dep->nombre_dependencia."</td>
            <td>".$dep->calle_num." ".$dep->cruzamientos." ".$dep->colonia."</td>";

            $personas = Persona::showdependenciapersona($dep);

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
        return view('Directorio.directorio', compact('cadena','sector','dependencia'));
    }
}
