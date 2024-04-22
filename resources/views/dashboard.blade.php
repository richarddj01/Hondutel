<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight py-3">
            Escritorio
        </h2>
    </x-slot>

    <div class="cointainer mx-md-5 shadow">
        <div class="row">
            <div class="col-6">
                <div class="card text-bg-primary mb-3">
                    <div class="card-header"><h5>Clientes</h5></div>
                        <div class="card-body">
                            <a href="{{ route('clientes.index') }}" class="btn btn-light">Ingresar</a>
                        </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-bg-secondary mb-3">
                    <div class="card-header"><h5>Zonas</h5></div>
                    <div class="card-body">
                        <a href="{{ route('zonas.index') }}" class="btn btn-light">Ingresar</a>
                    </div>
                </div>
            </div>
            <!--
            <div class="card text-bg-secondary mb-3 col-6" style="max-width: 18rem;">
            -->
        </div>
        <div class="row ">
            <div class="col-6">
                <div class="card text-bg-success mb-3">
                    <div class="card-header"><h5>Servicios</h5></div>
                        <div class="card-body">
                            <a href="{{ route('servicios.index') }}" class="btn btn-light">Ingresar</a>
                        </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-bg-danger mb-3">
                    <div class="card-header"><h5>Datos Técnicos</h5></div>
                    <div class="card-body">
                        <a href="{{ route('consulta_datos_telefono.index') }}" class="btn btn-light">Ingresar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-6">
                <div class="card text-bg-warning mb-3">
                    <div class="card-header"><h5>Averías</h5></div>
                        <div class="card-body">
                            <a href="{{ route('averias.index') }}" class="btn btn-light">Pendientes</a>
                            <a href="{{ route('averias.create') }}" class="btn btn-light">Registrar</a>
                        </div>
                </div>
            </div>
        </div>
    </div>

<!--

<div class="card text-bg-warning mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Warning card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card text-bg-info mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Info card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card text-bg-light mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Light card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card text-bg-dark mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Dark card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

-->
</x-app-layout>
