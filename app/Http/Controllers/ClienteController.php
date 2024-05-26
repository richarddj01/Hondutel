<?php

namespace App\Http\Controllers;

use App\Models\telefono;
use App\Models\abonado;
use App\Models\tipo_cliente;
use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\abonados_servicio;
use App\Models\servicio;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Clientes')->only('index');
        $this->middleware('can:Crear Clientes')->only('create', 'store');
        $this->middleware('can:Upd Clientes')->only('edit', 'update');
        $this->middleware('can:Del Clientes')->only('destroy');
        $this->middleware('can:Ver Cliente')->only('show');
    }

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




    public function create()
    {
        $tipo_cliente = tipo_cliente::all();
        return view('clientes.create', compact('tipo_cliente'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'apellido' => 'sometimes|nullable|max:50',
            'tipo_cliente_id' => 'required|numeric',
            'telefono' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'celular' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'correo' => 'nullable|email:rfc,dns',
            'direccion' => 'max:255',
        ]);

        cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente registrado exitosamente.');
    }

    public function show(cliente $cliente)
    {
        //Consulta de numeros asignados en la tabla abonados (usando la relación creada en el modelo cliente)
        if (isset($cliente->abonados[0]->id)){
            $query = abonados_servicio::query();
            $query->where('abonado_id', '=', $cliente->abonados[0]->id);

            $abonados_servicios = $query->get();
        }
        else{
            $abonados_servicios = null;
        }

        return view('clientes.show', compact('cliente', 'abonados_servicios'));
    }

    public function showServiciosContratados(cliente $cliente, string $abonado)
    {

        $abonados_servicios = abonados_servicio::where('abonado_id', $abonado)->get();

        return view('clientes.show_servicios', compact('cliente', 'abonados_servicios', 'abonado'));
    }
    public function createServiciosContratados(cliente $cliente, string $abonado)
    {

        $servicios = servicio::all();

        return view('clientes.agregar_servicio', compact('abonado', 'cliente', 'servicios'));
    }
    public function storeServiciosContratados(request $request, cliente $cliente, string $abonado)
    {

        $request->validate([
            'servicio_id' => 'required',
            'abonado_id' => 'required',
        ]);

        abonados_servicio::create($request->all());

        $servicios = servicio::all();

        $abonados_servicios = abonados_servicio::where('abonado_id', $abonado)->get();

        return view('clientes.show_servicios', compact('abonado', 'cliente', 'servicios', 'abonados_servicios'))->with('success', 'Servicio asignado correctamente');;
    }

    //Falta Corregir
    public function destroyServiciosContratados($abonados_servicio_id)
    {
        //$integerValue = intval($abonados_servicio_id); // $integerValue ahora es 123

        $abonado_servicio = abonados_servicio::find($abonados_servicio_id);
        $abonado = $abonado_servicio->abonado_id;
        $cliente = $abonado_servicio->abonado->cliente_id;
        $abonado_servicio->delete();

        $servicios = servicio::all();

        return redirect()->route('clientes.servicios', compact('abonado', 'cliente', 'servicios'))
            ->with('success', 'servicio eliminado exitosamente.');
    }
    //Eliminar servicios contratados
    public function destroyAbonado($id)
    {
        $abonado = Abonado::find($id);
        $abonado->delete();

        return redirect()->route('clientes.show', $abonado->cliente_id)
                        ->with('success', 'Número eliminado correctamente');
    }
    public function edit(cliente $cliente)
    {
        $tipo_cliente = tipo_cliente::all();
        return view('clientes.edit', compact('cliente', 'tipo_cliente'));
    }

    public function update(Request $request, cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'sometimes|nullable',
            'tipo_cliente_id' => 'required|numeric',
            'correo' => 'sometimes|nullable|email:rfc,dns'
            // Agrega aquí otras reglas de validación según sea necesario
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente ' . $cliente->identidad . ' actualizado exitosamente.');
    }

    public function destroy(cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'cliente eliminada exitosamente.');
    }

    //Vista para agregar número a cliente
    public function mostrarFormularioAgregarNumero(Cliente $cliente)
    {
        return view('clientes.agregar_numero', compact('cliente'));
    }
    //Para guardar el registro en abondos
    public function guardarNumero(Request $request, Cliente $cliente)
    {
        $request->validate([
            'numero' => 'required',
            'cliente_id' => 'required',
        ]);

        abonado::create($request->all());

        return redirect()->route('clientes.show', ['cliente' => $cliente])
            ->with('success', 'Número asignado correctamente.');
    }

    //Para la búsqueda escrita
    public function buscarNumeros(Request $request)
    {
        // Obtener números de teléfono que no están en la tabla abonados
        $numerosDisponibles = Telefono::whereNotIn('numero', function ($query) {
            $query->select('numero')
                ->from('abonados');
        })->get();

        $results = [];
        foreach ($numerosDisponibles as $numero) {
            $results[] = [
                'value' => $numero->id,
                'label' => $numero->numero,
            ];
        }

        return response()->json($results);
    }
}
