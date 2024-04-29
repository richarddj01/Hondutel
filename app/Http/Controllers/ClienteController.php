<?php

namespace App\Http\Controllers;

use App\Models\tipo_cliente;
use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\abonados_servicio;

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
            })->whereNull('deleted_at');
        }

        $clientes = $query->paginate(10);

        return view('clientes.index', compact('clientes'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipo_cliente = tipo_cliente::all();
        return view('clientes.create', compact('tipo_cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            //'identidad' => 'required|unique:clientes',
            'nombre' => 'required|alpha:ascii',
            'apellido' => 'sometimes|nullable|alpha:ascii',
            'tipo_cliente_id'=>'required|numeric',
            'correo' => 'sometimes|nullable|email:rfc,dns'
        ]);

        cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(cliente $cliente)
    {
        //Consulta de numeros asignados en la tabla abonados (usando la relación creada en el modelo cliente)
        //$cliente = cliente::with('abonados')->find($cliente->identidad);
        $query = abonados_servicio::query();
        $query->where('abonado_id','==',$cliente->id);

        $abonados_servicios = $query->get();
        return view('clientes.show', compact('cliente', 'abonados_servicios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cliente $cliente)
    {
        $tipo_cliente = tipo_cliente::all();
        return view('clientes.edit', compact('cliente', 'tipo_cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'sometimes|nullable',
            'tipo_cliente_id'=>'required|numeric',
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
