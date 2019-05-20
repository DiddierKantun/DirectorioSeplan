<?php

namespace App\Http\Controllers;

use App\Dependencia;
//use App\Sector;
use Illuminate\Http\Request;
use Session;

class DependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dependencias = Dependencia::dependenciasactiva();
        $depe = Dependencia::dependenciainactiva();
        return view( 'Dependencia.dependencia', compact('dependencias', 'depe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sector = Dependencia::showsector();
        return view('Dependencia.creardependencia',compact('sector'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dependencia::savedependencia($request);
        return redirect()->route('dependencia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function show(Dependencia $dependencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id_dependencia)
    {
        
        $dependencia = Dependencia::showdependencias( $id_dependencia);
        $sector = Dependencia::showsectorwherename($dependencia);       
        return view('Dependencia.editardependencia',compact('dependencia','sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_dependencia)
    {
        Dependencia::updatedependencia($request,$id_dependencia);
        return redirect()->route('dependencia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id_dependencia)
    {
        Dependencia::deletedependencia($id_dependencia);
        return redirect()->route('dependencia.index');
    }

    public function updatestatus( $id_dependencia )
    {
        Dependencia::updatestatus($id_dependencia);
        return redirect()->route('dependencia.index');
    }
}
