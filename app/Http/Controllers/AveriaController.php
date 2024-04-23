<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\Averia;
use App\Models\tipo_averia;
use App\Models\abonado;
use App\Models\telefono;
use Illuminate\Http\Request;

class AveriaController extends Controller
{
    public function index()
    {
        $averias = Averia::all();
        return view('averias.index', compact('averias'));
    }

    public function create(Request $request)
    {
        if ($request->has('search')) {
            $terminoBusqueda = $request->get('search');

            $abonado = abonado::get()->where('numero', '==', $terminoBusqueda)->first();

        }else{
            $abonado = null;
        }
        $tipo_averia = tipo_averia::all();

        return view('averias.create', compact('abonado','tipo_averia'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|numeric',
            'tipo_averia_id' => 'required|numeric',
            'detalle_problema' => 'sometimes'
        ]);

        $averia = new Averia($request->all());

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
        $datos_averia = ['usuario_reporte' => $usuario_reporte, 'fecha_reporte' => $fecha_reporte, 'detalle_problema'=>$detalle_problema, 'descripcion'=> $descripcion];

        return view('averias.show', compact('cliente', 'datos_averia'));
    }

    public function edit(Averia $averia)
    {
        $telefono = telefono::get()->first();
        $abonado = abonado::get()->first();
        $tipo_averia = tipo_averia::all();

        $numero= $abonado->numero;
        $nombre = $abonado->cliente->nombre.' '.$abonado->cliente->apellido;
        $telefono = $abonado->cliente->telefono;
        $celular = $abonado->cliente->celular;
        $direccion = $abonado->cliente->direccion;
        $correo = $abonado->cliente->correo;
        $zona = $abonado->telefono->zona->nombre_corto.' - '.$abonado->telefono->zona->descripcion;
        $cliente = ['numero' => $numero, 'direccion' => $direccion, 'nombre'=>$nombre,'zona'=>$zona];


        return view('averias.edit', compact('cliente', 'averia', 'abonado', 'telefono', 'tipo_averia'));
    }

    public function update(Request $request, Averia $averia)
    {
        $request->validate([
            'tipo_averia_id' => 'required|numeric',
            'detalle_problema' => 'sometimes',
            'user_id_tecnico' => 'nullable',
            'hora_inicio' => 'nullable|date_format:H:i:s',
            'ubicacion_latitud' => 'nullable|string',
            'ubicacion_longitud' => 'nullable|string',
            'hora_finalizado' => 'nullable|date_format:H:i:s',
            'observacion' => 'nullable|string',
            'tecnicos_encargados' => 'nullable|string',
        ]);

        //si tiene id de técnico, significa que
        if ($request->has('user_id_tecnico')) {
            $averia->user_id_tecnico = $request->user_id_tecnico;
        }
        $averia->update($request->all());

        return redirect()->route('averias.index')->with('success', 'Avería actualizada exitosamente.');
    }

    public function destroy(Averia $averia)
    {
        $averia->delete();

        return redirect()->route('averias.index')->with('success', 'Avería eliminada exitosamente.');
    }
    public function execute(Averia $averia)
    {
        $telefono = telefono::find($averia->numero);

        $zona = $telefono->zona->nombre_corto.' - '.
                $telefono->zona->descripcion;

        $abonado = $telefono->abonado;

        $nombre_abonado = $abonado->cliente->primer_nombre.' '.
                    $abonado->cliente->segundo_nombre.' '.
                    $abonado->cliente->primer_apellido.' '.
                    $abonado->cliente->segundo_apellido.' ';

        $direccion = $abonado->cliente->direccion;

        return view('averias.execute', compact('averia', 'nombre_abonado', 'zona', 'direccion'));
    }
}
