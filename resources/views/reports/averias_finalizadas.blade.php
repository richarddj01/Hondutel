<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Averías Finalizadas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th{
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            background-color: orange;
        }
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Averías Finalizadas</h1>
    <h4>Periodo: {{$fecha_inicio.' - '.$fecha_fin}}</h4>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha Reporte</th>
                <th>Hora</th>
                <th>Fecha de Finalización</th>
                <th>Hora</th>
                <th>Número</th>
                <th>Problema</th>
                <th>Reparó</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($averias as $averia)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $averia->created_at->format('d/m/Y') }}</td>
                    <td>{{ $averia->created_at->format('h:m A') }}</td>
                    <td>{{ $averia->updated_at->format('d/m/Y') }}</td>
                    <td>{{ $averia->updated_at->format('h:m A') }}</td>
                    <td>{{ $averia->numero }}</td>
                    <td>{{ $averia->tipo_averia->descripcion }}</td>
                    <td>{{ $averia->tecnicos_encargados }}</td>
                    <td>{{ $averia->observacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
