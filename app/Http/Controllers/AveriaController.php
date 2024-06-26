<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\averia;
use App\Models\tipo_averia;
use App\Models\abonado;
use App\Models\telefono;
use App\Models\inventario;
use Illuminate\Http\Request;

class AveriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Averias')->only('index');
        $this->middleware('can:Crear Averias')->only('create', 'store');
        $this->middleware('can:Upd Averias')->only('edit', 'update');
        $this->middleware('can:Del Averias')->only('destroy');
        $this->middleware('can:Ver Averia')->only('show');
        $this->middleware('can:Iniciar Averia')->only('execute', 'executeAveria');
        $this->middleware('can:Finalizar Averia')->only('finalizarAveria');
        $this->middleware('can:Listar Averias Finalizadas')->only('finalizadas', 'finalizadasf');
    }

    public function index()
    {
        $averias = averia::whereNull('hora_finalizado')->paginate(10);

        session(['averias' => $averias]);

        return view('averias.index', compact('averias'));
    }

    public function create(Request $request)
    {
        if ($request->has('search')) {
            $terminoBusqueda = $request->get('search');

            $abonado = abonado::get()->where('numero', '==', $terminoBusqueda)->first();
        } else {
            $abonado = null;
        }
        $tipo_averia = tipo_averia::all();

        return view('averias.create', compact('abonado', 'tipo_averia'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|numeric',
            'tipo_averia_id' => 'required|numeric',
            'detalle_problema' => 'sometimes'
        ]);

        $averia = new averia($request->all());

        $averia->solucionado = false;
        $averia->user_id = auth()->id();

        $averia->save();

        return redirect()->route('averias.index')->with('success', 'Avería creada exitosamente.');
    }

    public function show(Averia $averia)
    {
        $telefono = telefono::get()->first();
        $abonado = abonado::get()->first();

        //Obtencion de datos Cliente
        $numero = $abonado->numero;
        $direccion = $abonado->cliente->direccion;
        $nombre = $abonado->cliente->nombre . ' ' . $abonado->cliente->apellido;
        $zona = $telefono->zona->nombre_corto . ' - ' . $telefono->zona->descripcion;
        $cliente = ['numero' => $numero, 'direccion' => $direccion, 'nombre' => $nombre, 'zona' => $zona];

        //Datos avería
        $usuario_reporte = $averia->user->name;
        $fecha_reporte = $averia->created_at;
        $detalle_problema = $averia->detalle_problema;
        $descripcion = $averia->tipo_averia->descripcion;
        $datos_averia = ['usuario_reporte' => $usuario_reporte, 'fecha_reporte' => $fecha_reporte, 'detalle_problema' => $detalle_problema, 'descripcion' => $descripcion];

        session(['cliente' => $cliente, 'datos_averia'=> $datos_averia]);

        return view('averias.show', compact('cliente', 'datos_averia'));
    }

    public function edit(Averia $averia)
    {
        $telefono = telefono::get()->first();
        $abonado = abonado::get()->first();
        $tipo_averia = tipo_averia::all();

        $numero = $abonado->numero;
        $nombre = $abonado->cliente->nombre . ' ' . $abonado->cliente->apellido;
        $telefono = $abonado->cliente->telefono;
        $celular = $abonado->cliente->celular;
        $direccion = $abonado->cliente->direccion;
        $correo = $abonado->cliente->correo;
        $zona = $abonado->telefono->zona->nombre_corto . ' - ' . $abonado->telefono->zona->descripcion;
        $cliente = ['numero' => $numero, 'direccion' => $direccion, 'nombre' => $nombre, 'zona' => $zona];


        return view('averias.edit', compact('cliente', 'averia', 'abonado', 'telefono', 'tipo_averia'));
    }

    public function update(Request $request, Averia $averia)
    {
        $request->validate([
            'tipo_averia_id' => 'required|numeric',
            'detalle_problema' => 'sometimes',
        ]);

        $averia->update([
            'tipo_averia_id' => $request->tipo_averia_id,
            'detalle_problema' => $request->detalle_problema,
        ]);

        return redirect()->route('averias.index')->with('success', 'Avería actualizada exitosamente.');
    }

    public function destroy(Averia $averia)
    {
        $averia->delete();

        return redirect()->route('averias.index')->with('success', 'Avería eliminada exitosamente.');
    }
    public function execute(Averia $averia, Request $request)
    {
        $telefono = telefono::find($averia->numero);
        $abonado = abonado::get()->first();

        // Datos cliente/abonado
        $numero = $abonado->numero;
        $nombre = $abonado->cliente->nombre . ' ' . $abonado->cliente->apellido;
        $telefono = $abonado->cliente->telefono;
        $celular = $abonado->cliente->celular;
        $direccion = $abonado->cliente->direccion;
        $correo = $abonado->cliente->correo;
        $zona = $abonado->telefono->zona->nombre_corto . ' - ' . $abonado->telefono->zona->descripcion;
        $cliente = ['numero' => $numero, 'direccion' => $direccion, 'nombre' => $nombre, 'zona' => $zona];

        //Datos avería
        $usuario_reporte = $averia->user->name;
        $fecha_reporte = $averia->created_at;
        $detalle_problema = $averia->detalle_problema;
        $descripcion = $averia->tipo_averia->descripcion;
        $iniciado = $averia->iniciado;
        $datos_averia = ['usuario_reporte' => $usuario_reporte, 'fecha_reporte' => $fecha_reporte, 'detalle_problema' => $detalle_problema, 'descripcion' => $descripcion, 'iniciado' => $iniciado, 'id' => $averia->id];

        //Productos
        $productos = inventario::all();
        return view('averias.execute', compact('datos_averia', 'cliente', 'productos'));
    }
    public function executeAveria(Request $request, Averia $averia)
    {
        $request->validate([
            'user_id_tecnico' => 'nullable',
            'iniciado' => 'nullable|boolean',
            'hora_inicio' => 'nullable',
            'ubicacion_inicio' => 'nullable'
        ]);

        $averia->fill($request->only([
            'user_id_tecnico',
            'iniciado',
            'hora_inicio',
            'ubicacion_inicio'
        ]));

        $averia->save();

        return redirect()->route('averias.index')->with('success', 'Se inició la reparación de la avería.');
    }
    public function finalizarAveria(Request $request, Averia $averia)
    {
        $request->validate([
            'tecnicos_encargados' => 'nullable',
            'finalizado' => 'nullable|boolean',
            'hora_finalizado' => 'nullable',
            'ubicacion_final' => 'nullable',
            'observacion'
        ]);

        $averia->fill($request->only([
            'tecnicos_encargados',
            'finalizado',
            'hora_finalizado',
            'ubicacion_final',
            'observacion'
        ]));

        $averia->save();

        if ($request->has('productos') && $request->has('cantidades')) {
            $productos = $request->productos;
            $cantidades = $request->cantidades;

            foreach ($productos as $index => $producto_id) {
                $cantidad_usada = $cantidades[$index] ?? 1;

                // Registrar el producto usado en averia_inventario
                $averia->inventarios()->attach($producto_id, ['cantidad' => $cantidad_usada]);

                // Actualizar la cantidad en el inventario
                $inventario = inventario::findOrFail($producto_id);
                $inventario->cantidad -= $cantidad_usada;

                if ($inventario->cantidad < 0) {
                    return redirect()->back()->withErrors(['error' => 'No hay suficiente stock para el producto ' . $inventario->nombre]);
                }

                $inventario->save();
            }
        }

        return redirect()->route('averias.index')->with('success', 'Avería actualizada exitosamente.');
    }
    public function finalizadasf()
    {
        $averias = averia::whereNotNull('hora_finalizado')->paginate(10);

        return view('averias.finalizadas', compact('averias'));
    }

    public function finalizadas(Request $request)
    {
        // Validar los campos de fecha recibidos en la solicitud
        $request->validate([
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
        ]);

        // Obtener los valores de fecha de la solicitud
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        // Consulta de averías finalizadas con rango de fechas
        $query = Averia::whereNotNull('hora_finalizado');

        if ($fechaInicio && $fechaFin) {
            // Si se especifican ambas fechas, aplicar el rango
            $query->whereBetween('updated_at', [$fechaInicio, $fechaFin]);
        } elseif ($fechaInicio) {
            // Si solo se especifica la fecha de inicio, buscar desde esa fecha en adelante
            $query->where('updated_at', '>=', $fechaInicio);
        } elseif ($fechaFin) {
            // Si solo se especifica la fecha de fin, buscar hasta esa fecha
            $query->where('updated_at', '<=', $fechaFin);
        }

        // Obtener los resultados paginados
        $averias = $query->paginate(10);

        // Guardar averias en la sesión para el reporte
        session(['averias' => $averias, 'fecha_inicio' => $fechaInicio, 'fecha_fin' => $fechaFin]);

        // Devolver la vista con los datos de las averías finalizadas
        return view('averias.finalizadas', compact('averias'));
    }
    public function showFinalizadas(Averia $averia)
    {
        $telefono = telefono::get()->first();
        $abonado = abonado::get()->first();

        //Obtencion de datos Cliente
        $numero= $abonado->numero;
        $direccion = $abonado->cliente->direccion;
        $nombre = $abonado->cliente->nombre.' '.$abonado->cliente->apellido;
        $zona = $telefono->zona->nombre_corto.' - '.$telefono->zona->descripcion;
        $cliente = ['numero' => $numero, 'direccion' => $direccion, 'nombre'=>$nombre,'zona'=>$zona];

        //Datos avería
        $usuario_reporte = $averia->user->name;
        $fecha_reporte = $averia->created_at;
        $detalle_problema = $averia->detalle_problema;
        $descripcion = $averia->tipo_averia->descripcion;
        $fecha_reparacion = $averia->updated_at;
        $tecnicos = $averia->tecnicos_encargados;
        $ubicacion_inicio = $averia->ubicacion_inicio;
        $ubicacion_final = $averia->ubicacion_final;
        $datos_averia = ['usuario_reporte' => $usuario_reporte, 'fecha_reporte' => $fecha_reporte, 'detalle_problema'=>$detalle_problema, 'descripcion'=> $descripcion, 'fecha_reparacion' => $fecha_reparacion, 'tecnicos'=>$tecnicos, 'ubicacion_inicio' => $ubicacion_inicio, 'ubicacion_final'=>$ubicacion_final];

        // Obtener los productos utilizados en la avería
        $productos_utilizados = $averia->inventarios;

        return view('averias.showFinalizadas', compact('cliente', 'datos_averia', 'productos_utilizados'));
    }
}
