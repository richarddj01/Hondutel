<?php

namespace App\Http\Controllers;

use App\Models\datos_tecnicos_telefono;
use Illuminate\Http\Request;

class DatosTecnicosTelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'numero' => 'numeric|gt:0',
            // Agrega más reglas de validación según sea necesario para otros campos
        ]);
        $numero_telefono_formulario = $request->get('numero');

        $datos_resultado_busqueda = datos_tecnicos_telefono::find($numero_telefono_formulario);

        if(isset($datos_resultado_busqueda)){
            return view('consulta_datos_telefono', compact('datos_resultado_busqueda'));
        }
        else{
            return view('consulta_datos_telefono');
        }

        //return view('consulta_datos_telefono', ['datos' =>$datos]);
        //return view('consulta_datos_telefono',['datos'=>0]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    //public function show(datos_tecnicos_telefono $datos_tecnicos_telefono)
    public function show(Request $request)
    {
        //$datos = datos_tecnicos_telefono::findOrFail($id);

        //return view('consulta_datos_telefono', ['datos' => $datos]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(datos_tecnicos_telefono $datos_tecnicos_telefono)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, datos_tecnicos_telefono $datos_tecnicos_telefono)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(datos_tecnicos_telefono $datos_tecnicos_telefono)
    {
        //
    }
}
