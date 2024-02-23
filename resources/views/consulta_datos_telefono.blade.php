<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div>
<x-app-layout>
    <x-slot name="header">

        <div class="py-4 align-items-center text-center">
            <h2>
                Consulta de datos técnicos
            </h2>
        </div>       
    </x-slot>
    @if(isset($datos_resultado_busqueda->numero))
    <div class="container mt-5">
        <form method="" class="p-4 bg-white shadow-sm rounded mt-4">
            <div class="d-flex flex-row align-items-center">
                <input class="form-control me-2" id="numero" type="number" name="numero" value="{{$datos_resultado_busqueda->numero}}" placeholder="Ingrese un número">
                <button class="btn btn-success " type="submit">
                    Buscar
                </button>
            </div>
        </form>
    </div>

    <div class="container text-center mt-3">
        <div class="p-4 rounded shadow">
            <h4>Resultado de la búsqueda:</h1>
            <div class="row mt-5">
                <div class="col-4"><strong><p>Número: </p></strong></div>
                <div class="col-4"><strong><p>Armario: </p></strong></div>
                <div class="col-4"><strong><p>Par Primario: </p></strong></div>
            </div>
            <div class="row">
                <div class="col-4">{{ $datos_resultado_busqueda->numero }}</div>
                <div class="col-4">{{ $datos_resultado_busqueda->armario }}</div>
                <div class="col-4">{{ $datos_resultado_busqueda->par_primario }}</div>
            </div>
            <div class="row mt-5">
                <div class="col-4"><strong><p>Par Secundario: </p></strong></div>
                <div class="col-4"><strong><p>Caja Terminal: </p></strong></div>
                <div class="col-4"><strong><p>Borne: </p></strong></div>
            </div>
            <div class="row">
                <div class="col-4">{{ $datos_resultado_busqueda->par_secundario }}</div>
                <div class="col-4">{{ $datos_resultado_busqueda->caja_terminal }}</div>
                <div class="col-4">{{ $datos_resultado_busqueda->borne }}</div>
            </div>          
        </div>
    
    @else
        <div class="container mt-5">
            <form method="" class="p-4 bg-white shadow-sm rounded mt-4">
                <div class="d-flex flex-row align-items-center">
                    <input class="form-control me-2" id="numero" type="number" name="numero" value="" placeholder="Ingrese un número">
                    <button class="btn btn-success " type="submit">
                        Buscar
                    </button>
                </div>
            </form>
        </div>
    @endif
    </div>
    

    
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Detecta la configuración del sistema
        const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');

        // Aplica las clases de modo oscuro si está activado
        if (prefersDarkScheme.matches) {
            document.body.classList.add('dark');
        } else {
            document.body.classList.remove('dark');
        }
    });
</script>
