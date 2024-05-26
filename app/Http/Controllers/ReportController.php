<?php

namespace App\Http\Controllers;

use App\Models\abonado;
use App\Models\Averia;
use App\Models\telefono;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use PDF;
class ReportController extends Controller
{
    public function averiasFinalizadas()
    {
        // Obtener averías de la sesión
        $averias = session('averias');
        $fecha_inicio = session('fecha_inicio');
        $fecha_fin = session('fecha_fin');

        if (is_null($averias)) {
            return redirect()->route('averias.finalizadas')->with('error', 'No hay datos para generar el PDF.');
        }

        // Generar el PDF
        $pdf = PDF::loadView('reports.averias_finalizadas', compact('averias', 'fecha_inicio', 'fecha_fin'));

        // Descargar el archivo PDF
        return $pdf->download('averias_finalizadas.pdf');
    }

    public function averiasPendientes()
    {
        $averias = session('averias');

        if (is_null($averias)) {
            return redirect()->route('averias.index')->with('error', 'No hay datos para generar el PDF.');
        }

        $pdf = PDF::loadView('reports.averias_pendientes', compact('averias'));

        return $pdf->download('averias_pendientes.pdf');
    }
    public function averiasDetalles()
    {
        $cliente = session('cliente');
        $datos_averia = session('datos_averia');

        if (is_null($cliente) || is_null($datos_averia)) {
            return redirect()->route('averias.index')->with('error', 'No hay datos para generar el PDF.');
        }

        $pdf = PDF::loadView('reports.averia_detalles', compact('cliente', 'datos_averia'));

        return $pdf->download('averia_detalles.pdf');
    }

    public function averiasFinalizadasDetalle(Averia $averia)
    {
        $telefono = telefono::get()->first();
        $abonado = abonado::get()->first();

        // Obtención de datos Cliente
        $numero= $abonado->numero;
        $direccion = $abonado->cliente->direccion;
        $nombre = $abonado->cliente->nombre.' '.$abonado->cliente->apellido;
        $zona = $telefono->zona->nombre_corto.' - '.$telefono->zona->descripcion;
        $cliente = ['numero' => $numero, 'direccion' => $direccion, 'nombre'=>$nombre,'zona'=>$zona];

        // Datos avería
        $usuario_reporte = $averia->user->name;
        $fecha_reporte = $averia->created_at;
        $detalle_problema = $averia->detalle_problema;
        $descripcion = $averia->tipo_averia->descripcion;
        $fecha_reparacion = $averia->updated_at;
        $tecnicos = $averia->tecnicos_encargados;
        $ubicacion_inicio = $averia->ubicacion_inicio;
        $ubicacion_final = $averia->ubicacion_final;
        $datos_averia = [
            'usuario_reporte' => $usuario_reporte,
            'fecha_reporte' => $fecha_reporte,
            'detalle_problema' => $detalle_problema,
            'descripcion' => $descripcion,
            'fecha_reparacion' => $fecha_reparacion,
            'tecnicos' => $tecnicos,
            'ubicacion_inicio' => $ubicacion_inicio,
            'ubicacion_final' => $ubicacion_final
        ];

        // Datos de productos utilizados
        $productos_utilizados = $averia->inventarios;

        // Carga la vista y genera el PDF
        $pdf = PDF::loadView('reports.averia_dinalizada_detalle', compact('cliente', 'datos_averia', 'productos_utilizados'));
        return $pdf->download('averia_'.$averia->id.'.pdf');
    }
}
