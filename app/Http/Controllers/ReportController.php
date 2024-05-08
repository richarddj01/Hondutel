<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ReportController extends Controller
{
    public function index()
    {
        $tables = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        return view('reportes.index', compact('tables'));
    }

    public function generate(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'table' => 'required|string', // Asegura que se haya seleccionado una tabla
            'filters' => 'nullable|array', // Los filtros son opcionales y deben ser un arreglo
        ]);

        $table = $request->input('table');
        $filters = $request->input('filters', []);

        // Procesar la generación del reporte
        // Aquí puedes utilizar $table y $filters para construir la consulta del reporte

        // Ejemplo de cómo podrías utilizar estos datos:
        $data = [
            'table' => $table,
            'filters' => $filters,
        ];

        // Redirigir o mostrar la vista de resultados del reporte
        return view('reportes.resultados')->with('data', $data);
    }

    public function getColumns($table)
    {
        $columns = Schema::getColumnListing($table);
        return response()->json($columns);
    }
}
