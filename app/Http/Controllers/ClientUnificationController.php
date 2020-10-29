<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\ClientUnification;
use App\Models\User;
use Illuminate\Http\Request;

class ClientUnificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = ClientUnification::orderBy('created_at', 'DESC')->paginate(10);
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
        return view('admin.unification.form-add', compact('asesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $nuevoRegistro = new ClientUnification;
            $nuevoRegistro->descripcion = $request->descripcion;
            $nuevoRegistro->asesor_id = $request->asesor_id;
            $nuevoRegistro->user_id = $request->user_id;

            $nuevoRegistro->save();
            return redirect('admin/unification');
        } catch (\Throwable $th) {
            return view('errors.error-store');
        }
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
     * @return \Illuminate\Http\Response
     */
    public function edit($clientUnification)
    {
        $user_id = User::findOrFail(auth()->id());
        $clientUnification = ClientUnification::findOrFail($clientUnification);
        if ($user_id->id == $clientUnification->user_id) {
            $asesores = Asesor::all();
            return view('admin.unification.form-edit', compact('clientUnification', 'asesores'));
        }
        return view('errors.error-notpermision');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientUnification  $clientUnification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clientUnification)
    {
        try {
            $update = clientUnification::findOrFail($clientUnification);
            $update->descripcion = $request->descripcion;
            $update->asesor_id = $request->asesor_id;
            $update->user_id = $request->user_id;
            $update->save();
            return redirect('admin/unification');
        } catch (\Throwable $th) {
            return view('errors.error-update');
        }
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
