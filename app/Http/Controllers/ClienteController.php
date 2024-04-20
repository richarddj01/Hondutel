<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\servicio;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $query = cliente::query();

        if ($request->has('search')) {
            // Divide la cadena de búsqueda en términos individuales
            $terminosBusqueda = explode(' ', $request->get('search'));

            $query->where(function ($query) use ($terminosBusqueda) {
                foreach ($terminosBusqueda as $term) {
                    $query->where(function ($query) use ($term) {
                        $query->where('nombre', 'like', '%' . $term . '%')
                              ->orWhere('apellido', 'like', '%' . $term . '%');
                    });
                }
            });
        }

        $clientes = $query->paginate(10);

        return view('clientes.index', compact('clientes'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'identidad' => 'required|unique:clientes',
            'primer_nombre' => 'required',
            'primer_apellido' => 'required',
        ]);

        cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'cliente registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(cliente $cliente)
    {
        //Consulta de numeros asignados en la tabla abonados (usando la relación creada en el modelo cliente)
        //$cliente = cliente::with('abonados')->find($cliente->identidad);
        //$servicios = servicio::all();
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, cliente $cliente)
    {
        $request->validate([
            'primer_nombre' => 'required|alpha:ascii',
            'segundo_nombre' => 'sometimes|nullable|alpha:ascii',
            'primer_apellido' => 'required|alpha:ascii',
            'segundo_apellido' => 'sometimes|nullable|alpha:ascii',
            'correo' => 'sometimes|nullable|email:rfc,dns'
            // Agrega aquí otras reglas de validación según sea necesario
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente '.$cliente->identidad.' actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'cliente eliminada exitosamente.');
    }
}
