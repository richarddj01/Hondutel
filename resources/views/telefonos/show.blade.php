<x-app-layout>
    <x-slot name="header">

        <div class="py-4 align-items-center text-center">
            <h2>
                Información
            </h2>
        </div>
    </x-slot>

    @if(isset($telefono))
        <div class="container">
            <div class="text-center my-3 card shadow">
                <div class="px-3 py-5 rounded">
                <div class="row mb-4">
                    <div class="col-12"><h5><strong>Número: </strong>{{ $telefono->numero }}</h5></div>
                </div>
                <div class="row">
                    <div class="col-4"><strong><p>Zona: </p></strong></div>
                    <div class="col-4"><strong><p>Armario: </p></strong></div>
                    <div class="col-4"><strong><p>Par Primario: </p></strong></div>
                </div>
                <div class="row">
                    <div class="col-4">{{ $telefono->zona->nombre_corto.' - '.$telefono->zona->descripcion ?? 'N/D'}}</div>
                    <div class="col-4">{{ $telefono->armario ?? 'N/D'}}</div>
                    <div class="col-4">{{ $telefono->par_primario ?? 'N/D'}}</div>
                </div>
                <div class="row mt-5">
                    <div class="col-4"><strong><p>Par Secundario: </p></strong></div>
                    <div class="col-4"><strong><p>Caja Terminal: </p></strong></div>
                    <div class="col-4"><strong><p>Borne: </p></strong></div>
                </div>
                <div class="row">
                    <div class="col-4">{{ $telefono->par_secundario ?? 'N/D'}}</div>
                    <div class="col-4">{{ $telefono->caja_terminal ?? 'N/D'}}</div>
                    <div class="col-4">{{ $telefono->borne ?? 'N/D'}}</div>
                </div>
                <div class="row mt-5">
                    <div class="col-4"><strong><p>Número de Enlace: </p></strong></div>
                    <div class="col-4"><strong><p>Número de Cable: </p></strong></div>
                    <div class="col-4"><strong><p>Ruta: </p></strong></div>
                </div>
                <div class="row">
                    <div class="col-4">{{ $telefono->numero_de_enlace ?? 'N/D'}}</div>
                    <div class="col-4">{{ $telefono->numero_cable ?? 'N/D'}}</div>
                    <div class="col-4">{{ $telefono->ruta ?? 'N/D'}}</div>
                </div>
                <div class="row mt-5">
                    <div class="col-4"><strong><p>Codigo POTS: </p></strong></div>
                    <div class="col-4"><strong><p>Codigo Puerto POTS: </p></strong></div>
                    <div class="col-4"><strong><p>Codigo ADSL: </p></strong></div>
                </div>
                <div class="row">
                    <div class="col-4">{{ $telefono->codigo_pots ?? 'N/D'}}</div>
                    <div class="col-4">{{ $telefono->podigo_puerto_pots ?? 'N/D'}}</div>
                    <div class="col-4">{{ $telefono->codigo_adsl ?? 'N/D'}}</div>
                </div>
                <div class="row mt-5">
                    <div class="col-4"><strong><p>Codigo Puerto ADSL: </p></strong></div>
                    <div class="col-4"><strong><p>Velocidad: </p></strong></div>
                    <div class="col-4"><strong><p>IP Publica: </p></strong></div>
                </div>
                <div class="row">
                    <div class="col-4">{{ $telefono->codigo_puerto_adsl ?? 'N/D'}}</div>
                    <div class="col-4">{{ $telefono->velocidad ?? 'N/D'}}</div>
                    <div class="col-4">{{ $telefono->ip_publica ?? 'N/D'}}</div>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
