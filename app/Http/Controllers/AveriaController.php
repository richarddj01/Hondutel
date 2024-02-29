<?php

namespace App\Http\Controllers;

use App\Models\Averia;
use App\Models\zona;
use App\Models\abonado;
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
        $zonas = Zona::where('oculto', false)->orderBy('nombre_corto')->get();
          
        if ($request->has('search')) {
            $terminoBusqueda = $request->get('search');
            
            $abonado = Abonado::where('numero', $terminoBusqueda)
            ->join('personas', 'abonados.identidad', '=', 'personas.identidad')
            ->selectRaw("CONCAT(personas.primer_nombre, ' ', personas.segundo_nombre, ' ', personas.primer_apellido) AS nombre_completo")
            ->select('personas.identidad','telefono', 'celular', 'correo', 'direccion')
            ->first();
            if($abonado == null){
                $abonado = 'no_encontrado';
            }
        }else{
            $abonado = null;
        }
        return view('averias.create', compact('zonas', 'abonado'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'zona_id' => 'required|exists:zonas,id',
            'numero' => 'required|exists:abonados,numero',
            'problema_presentado' => 'required|string',
            'hora_inicio' => 'required|date_format:H:i:s',
            'ubicacion_latitud' => 'nullable|string',
            'ubicacion_longitud' => 'nullable|string',
            'hora_finalizado' => 'required|date_format:H:i:s',
            'solucionado' => 'required|boolean',
            'observacion' => 'nullable|string',
            'tecnicos_encargados' => 'nullable|string',
        ]);

        Averia::create($request->all());

        return redirect()->route('averias.index')->with('success', 'Avería creada exitosamente.');
    }

    public function show(Averia $averia)
    {
        return view('averias.show', compact('averia'));
    }

    public function edit(Averia $averia)
    {
        return view('averias.edit', compact('averia'));
    }

    public function update(Request $request, Averia $averia)
    {
        $request->validate([
            'zona_id' => 'required|exists:zonas,id',
            'numero' => 'required|exists:abonados,numero',
            'problema_presentado' => 'required|string',
            'hora_inicio' => 'required|date_format:H:i:s',
            'ubicacion_latitud' => 'nullable|string',
            'ubicacion_longitud' => 'nullable|string',
            'hora_finalizado' => 'required|date_format:H:i:s',
            'solucionado' => 'required|boolean',
            'observacion' => 'nullable|string',
            'tecnicos_encargados' => 'nullable|string',
        ]);

        $averia->update($request->all());

        return redirect()->route('averias.index')->with('success', 'Avería actualizada exitosamente.');
    }

    public function destroy(Averia $averia)
    {
        $averia->delete();

        return redirect()->route('averias.index')->with('success', 'Avería eliminada exitosamente.');
    }
}
