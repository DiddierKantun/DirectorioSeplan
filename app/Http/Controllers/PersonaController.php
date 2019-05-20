<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Enlace;
use App\Dependencia;
use Illuminate\Http\Request;
use Session;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::personaactiva();
        $per = Persona::personainactiva();
        return view( 'Persona.persona', compact('personas', 'per'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_de_enlace = Persona::showenlace();
        $dependencias = Persona::showdependencias();
        return view("Persona.crearpersona", compact('tipo_de_enlace', 'dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Persona::savepersona($request);
        return redirect()->route('persona.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        $perso = Persona::showpersona($persona);
        $tipo_de_enlace = Persona::showenlacewherenombre($perso);
        $dependencias = Persona::showdependenciawherenombre($perso);
        return view('Persona.editarpersona', compact('perso', 'tipo_de_enlace', 'dependencias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_persona)
    {
        Persona::updatepersona($request,$id_persona);
        return redirect()->route('persona.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_persona)
    {
        Persona::deletepersona($id_persona);
        return redirect()->route('persona.index');
    }

    public function updatestatus($id_persona)
    {
        Persona::updatestatus($id_persona);
        return redirect()->route('persona.index');
    }

}
