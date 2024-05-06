<?php

namespace App\Http\Controllers;

use App\Models\telefono;
use App\Models\zona;
use Illuminate\Http\Request;

class TelefonoController extends Controller
{
    public function index(Request $request)
    {
        $telefonos = telefono::paginate(10);

        return view('telefonos.index', compact('telefonos'));
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

    }

    /**
     * Display the specified resource.
     */
    //public function show(datos_tecnicos_telefono $datos_tecnicos_telefono)
    public function show(telefono $telefono)
    {
        return view('telefonos.show', compact('telefono'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(telefono $telefono)
    {
        $zonas = zona::all();
        return view('telefonos.edit', compact('telefono','zonas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, telefono $telefono)
    {
        $request->validate([
            'par_primario' => 'sometimes|numeric',
        ]);

        $telefono->update($request->all());

        return redirect()->route('telefonos.index')
            ->with('success', 'Teléfono actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(telefono $datosTecnicos)
    {
        //
    }

    public function mostrarDatosTelefono(Request $request)
    {
        $request->validate([
            'numero' => 'numeric|gt:0',
        ]);
        $numero_telefono_formulario = $request->get('numero');

        $datos_resultado_busqueda = telefono::find($numero_telefono_formulario);

        if(isset($datos_resultado_busqueda)){
            if($datos_resultado_busqueda == null){
                $datos_resultado_busqueda = 'no_encontrado';
            }
            return view('telefonos.consulta_datos_telefono', compact('datos_resultado_busqueda'));
        }
        else{
            return view('telefonos.consulta_datos_telefono')->with('success','Número no encontrado');
        }
        //return view('consulta_datos_telefono', ['datos' =>$datos]);
        //return view('consulta_datos_telefono',['datos'=>0]);
    }
}
