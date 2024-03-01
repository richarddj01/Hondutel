<?php

namespace App\Http\Controllers;

use App\Models\Averia;
use App\Models\zona;
use App\Models\abonado;
use App\Models\datos_tecnicos_telefono;
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
            
            $abonado = Abonado::where('numero', $terminoBusqueda)
            ->join('personas', 'abonados.identidad', '=', 'personas.identidad')
            ->selectRaw("CONCAT(personas.primer_nombre, ' ', COALESCE(personas.segundo_nombre,''), ' ', personas.primer_apellido, ' ', COALESCE(personas.segundo_apellido,'')) AS nombre_completo, personas.identidad, telefono, celular, correo, direccion")
            ->first();
        
            //buscar la zona a la que pertenece el numero
            $zonas  = datos_tecnicos_telefono::with('zona')
            ->where('numero', $terminoBusqueda)
            ->select('zonas_id')
            ->first();

            if(isset($zonas)&&isset($terminoBusqueda)){
                $abonado->zonas = $zonas;
                $abonado->numero = $terminoBusqueda;
            }
            if($abonado == null){
                $abonado = 'no_encontrado';
            }
        }else{
            $abonado = null;
        }
        return view('averias.create', compact('abonado'));
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
