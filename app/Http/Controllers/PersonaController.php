<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\tipo_servicio;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // PersonaController.php

    public function index(Request $request)
    {
        $query = Persona::query();
    
        if ($request->has('search')) {
            // Divide la cadena de búsqueda en términos individuales
            $terminosBusqueda = explode(' ', $request->get('search'));
    
            $query->where(function ($query) use ($terminosBusqueda) {
                foreach ($terminosBusqueda as $term) {
                    $query->where(function ($query) use ($term) {
                        $query->where('primer_nombre', 'like', '%' . $term . '%')
                              ->orWhere('segundo_nombre', 'like', '%' . $term . '%')
                              ->orWhere('primer_apellido', 'like', '%' . $term . '%')
                              ->orWhere('segundo_apellido', 'like', '%' . $term . '%');
                    });
                }
            });
        }
        
        $personas = $query->paginate(10);
    
        return view('personas.index', compact('personas'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'identidad' => 'required|unique:personas',
            'primer_nombre' => 'required',
            'primer_apellido' => 'required',
        ]);

        Persona::create($request->all());

        return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        //Consulta de numeros asignados en la tabla abonados (usando la relación creada en el modelo persona)
        $persona = persona::with('abonados')->find($persona->identidad);
        $servicios = tipo_servicio::all();
        return view('personas.show', compact('persona','servicios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        return view('personas.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'primer_nombre' => 'required|alpha:ascii',
            'segundo_nombre' => 'sometimes|nullable|alpha:ascii',
            'primer_apellido' => 'required|alpha:ascii',
            'segundo_apellido' => 'sometimes|nullable|alpha:ascii',
            'correo' => 'sometimes|nullable|email:rfc,dns'
            // Agrega aquí otras reglas de validación según sea necesario
        ]);

        $persona->update($request->all());

        return redirect()->route('personas.index')
            ->with('success', 'Cliente '.$persona->identidad.' actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();

        return redirect()->route('personas.index')
            ->with('success', 'Persona eliminada exitosamente.');
    }
}
