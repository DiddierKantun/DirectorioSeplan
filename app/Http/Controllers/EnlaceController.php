<?php

namespace App\Http\Controllers;

use App\Enlace;
use Illuminate\Http\Request;
use Session;

class EnlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enlaces = Enlace::enlaceactivo();
        $enlac = Enlace::enlaceinactivo();
        return view('Enlace.enlace',compact('enlaces','enlac'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Enlace.crearenlace');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Enlace::saveenlace($request);
        return redirect()->route('enlace.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enlace  $enlace
     * @return \Illuminate\Http\Response
     */
    public function show(Enlace $enlace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enlace  $enlace
     * @return \Illuminate\Http\Response
     */
    public function edit(Enlace $enlace)
    {       
        return view('enlace.editarenlace', compact('enlace'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enlace  $enlace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_enlace)
    {
        Enlace::updateenlace($request,$id_enlace);
        return redirect()->route('enlace.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enlace  $enlace
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_enlace)
    {
        Enlace::deleteenlace($id_enlace);
        return redirect()->route('enlace.index');
    }

    public function updatestatus($id_enlace)
    {
        Enlace::updatestatus( $id_enlace);
        return redirect()->route('enlace.index');
    }
}
