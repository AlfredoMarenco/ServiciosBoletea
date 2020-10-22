<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\ClientUnification;
use Illuminate\Http\Request;

class ClientUnificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = ClientUnification::all();
        return view('admin.unification.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asesores = Asesor::all();
        return view('admin.unification.form-add',compact('asesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevoRegistro = new ClientUnification;
        $nuevoRegistro->descripcion = $request->descripcion;
        $nuevoRegistro->asesor_id = $request->asesor_id;
        $nuevoRegistro->user_id = $request->user_id;

        $nuevoRegistro->save();
        return view('admin.unification.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientUnification  $clientUnification
     * @return \Illuminate\Http\Response
     */
    public function show(ClientUnification $clientUnification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientUnification  $clientUnification
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientUnification $clientUnification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientUnification  $clientUnification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientUnification $clientUnification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientUnification  $clientUnification
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientUnification $clientUnification)
    {
        //
    }
}
