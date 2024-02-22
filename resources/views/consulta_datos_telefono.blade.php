<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Consulta de datos técnicos') }}
        </h2>
    </x-slot>
    
<div class="container">
    <form method="GET" class="p-4 bg-white shadow-sm rounded mt-4">
        <div class="d-flex flex-row align-items-center">
            <input class="form-control me-2" id="numero" type="text" name="numero" placeholder="Ingrese un número">
            <button class="btn btn-success text-black" type="submit">
                Enviar
            </button>
        </div>
    </form>
</div>


</div>

    @if ($datos>0)
    @foreach ($datos as $dato)
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @if ($datos)
                <h1>Resultado de la búsqueda para ID {{ '' }}:</h1>
                <p>Número: {{ $dato->numero }}</p>
                <p>Armario: {{ $dato->armario }}</p>
                <p>Par Primario: {{ $dato->par_primario }}</p>
                @else
                    <p>No se encontró ningún dato con el ID {{ $id }}</p>
                @endif 
                </div>
            </div>
        </div>   
    </div> 
    
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5 class="card-text">{{ $dato->numero }}</h5> 
                    <h5 class="card-text">{{ $dato->armario }}</h5> 
                    <h5 class="card-text">{{ $dato->par_primario }}</h5> 
                </div>
            </div>
        </div>   
    </div> 
    @endforeach
    
    @else

    @endif
    
    
</x-app-layout>
