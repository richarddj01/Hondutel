<x-app-layout>
    <x-slot name="header">

        <div class="py-4 align-items-center text-center">
            <h2>
                Consulta de datos técnicos
            </h2>
        </div>       
    </x-slot>

    @if(isset($datos_resultado_busqueda->numero))
        @if($datos_resultado_busqueda != 'no_encontrado')
        <div class="container mt-3">
        <form method="" class="p-4 bg-white shadow-sm rounded">
            <div class="d-flex flex-row align-items-center">
                <input class="form-control me-2" id="numero" type="tel" name="numero" value="{{ $datos_resultado_busqueda->numero ?? '' }}" placeholder="Ingrese un número">
                <button class="btn btn-success " type="submit">Buscar</button>
            </div>
        </form>
        </div>
        <div class="container">
            <div class="text-center my-3 card shadow">
                <div class="px-3 py-5 rounded">
                <h4>Resultado de la búsqueda:</h4>
                <div class="row my-5">
                    <div class="col-12"><h5><strong>Número: </strong>{{ $datos_resultado_busqueda->numero }}</h5></div>
                </div>
                <div class="row">
                    <div class="col-4"><strong><p>Zona: </p></strong></div>
                    <div class="col-4"><strong><p>Armario: </p></strong></div>
                    <div class="col-4"><strong><p>Par Primario: </p></strong></div>
                </div>
                <div class="row">
                    <div class="col-4">{{ $datos_resultado_busqueda->zona->nombre_corto.' - '.$datos_resultado_busqueda->zona->descripcion }}</div>
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
        </div>
        @else

        error

        @endif
    @elseif(isset($mensaje))
        <div class="container mt-5">
            <div class="alert alert-info">{{ $mensaje }}</div>
        </div>
        <div class="container mt-5">
            <form method="" class="p-4 bg-white shadow-sm rounded mt-4">
                <div class="d-flex flex-row align-items-center">
                    <input class="form-control me-2" id="numero" type="tel" name="numero" value="" placeholder="Ingrese un número">
                    <button class="btn btn-success " type="submit">
                        Buscar
                    </button>
                </div>
            </form>
        </div>
    @else
        <div class="container mt-5">
            <form method="" class="p-4 bg-white shadow-sm rounded mt-4">
                <div class="d-flex flex-row align-items-center">
                    <input class="form-control me-2" id="numero" type="tel" name="numero" value="" placeholder="Ingrese un número">
                    <button class="btn btn-success " type="submit">
                        Buscar
                    </button>
                </div>
            </form>
        </div>
    @endif
    </div>
    

    

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

</x-app-layout>
