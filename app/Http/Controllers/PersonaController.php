<?php

namespace App\Http\Controllers;

use App\Models\Persona;
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
            $search = $request->get('search');
            $query->where('identidad', 'like', '%'.$search.'%')
                ->orWhere('primer_nombre', 'like', '%'.$search.'%')
                ->orWhere('segundo_nombre', 'like', '%'.$search.'%')
                ->orWhere('primer_apellido', 'like', '%'.$search.'%')
                ->orWhere('segundo_apellido', 'like', '%'.$search.'%');
        }

        $personas = $query->get();

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
            // Agrega aquí otras reglas de validación según sea necesario
        ]);

        Persona::create($request->all());

        return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        return view('personas.show', compact('persona'));
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
