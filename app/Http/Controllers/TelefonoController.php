<?php

namespace App\Http\Controllers;

use App\Models\telefono;
use App\Models\zona;
use Illuminate\Http\Request;

class TelefonoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Listar Telefonos')->only('index');
        $this->middleware('can:Editar Telefonos')->only('edit', 'update');
        $this->middleware('can:Del Telefonos')->only('destroy');
        $this->middleware('can:Modulo Datos Tecnicos')->only('mostrarDatosTelefono');
    }

    public function index(Request $request)
    {
        $query = telefono::query();

        if ($request->has('search')) {
            // Divide la cadena de búsqueda en términos individuales
            $terminosBusqueda = explode(' ', $request->get('search'));

            $query->where(function ($query) use ($terminosBusqueda) {
                foreach ($terminosBusqueda as $term) {
                    $query->where('numero', 'like', '%' . $term . '%');
                }
            });
        }

        $telefonos = $query->paginate(10);

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
        return view('telefonos.edit', compact('telefono', 'zonas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, telefono $telefono)
    {
        $request->validate([
            'armario' => 'nullable|numeric|max:11',
            'par_primario' => 'nullable|numeric',
            'par_secundario' => 'nullable|numeric',
            'caja_terminal' => 'nullable|max:11',
            'borne' => 'nullable|numeric|max:11',
            'ruta' => 'nullable|numeric|max:11',
            'codigo_pots' => 'nullable|numeric|max:11',
            'codigo_puerto_pots' => 'nullable|numeric|max:11',
            'codigo_adsl' => 'nullable|numeric|max:11',
            'coidgo_puerto_adsl' => 'nullable|numeric',
            'numero_de_cable' => 'nullable|numeric',
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
        $numero_telefono_formulario = $request->input('numero');

        $datos_resultado_busqueda = telefono::find($numero_telefono_formulario);

        if ($datos_resultado_busqueda === null) {
            return view('telefonos.consulta_datos_telefono')->with('status', 'Número no encontrado');
        } else {
            return view('telefonos.consulta_datos_telefono', compact('datos_resultado_busqueda'));
        }
    }
}
