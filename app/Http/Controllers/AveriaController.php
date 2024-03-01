<?php

namespace App\Http\Controllers;

use App\Models\Auth;
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
            'numero' => 'required|exists:abonados,numero',
            'problema_presentado' => 'required|string',
        ]);
    
        $averia = new Averia($request->all());
    
        $averia->solucionado = false;
        $averia->user_id = auth()->id();
    
        $averia->save();
    
        return redirect()->route('averias.index')->with('success', 'Avería creada exitosamente.');
    }
    
    public function show(Averia $averia)
    {
        $datos_tecnicos_telefono = datos_tecnicos_telefono::find($averia->numero);
        
        $zona = $datos_tecnicos_telefono->zona->nombre_corto.' - '.
                $datos_tecnicos_telefono->zona->descripcion;

        $abonado = $datos_tecnicos_telefono->abonado;

        $nombre_abonado = $abonado->persona->primer_nombre.' '.
                    $abonado->persona->segundo_nombre.' '.
                    $abonado->persona->primer_apellido.' '.
                    $abonado->persona->segundo_apellido.' ';
        
        $direccion = $abonado->persona->direccion;

        return view('averias.show', compact('averia', 'nombre_abonado', 'zona', 'direccion'));
    }

    public function edit(Averia $averia)
    {
            $terminoBusqueda = $averia->numero;
            
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
        return view('averias.edit', compact('averia', 'abonado'));
    }

    public function update(Request $request, Averia $averia)
    {
        $request->validate([
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
        $datos_tecnicos_telefono = datos_tecnicos_telefono::find($averia->numero);
        
        $zona = $datos_tecnicos_telefono->zona->nombre_corto.' - '.
                $datos_tecnicos_telefono->zona->descripcion;

        $abonado = $datos_tecnicos_telefono->abonado;

        $nombre_abonado = $abonado->persona->primer_nombre.' '.
                    $abonado->persona->segundo_nombre.' '.
                    $abonado->persona->primer_apellido.' '.
                    $abonado->persona->segundo_apellido.' ';
        
        $direccion = $abonado->persona->direccion;

        return view('averias.execute', compact('averia', 'nombre_abonado', 'zona', 'direccion'));
    }

}
