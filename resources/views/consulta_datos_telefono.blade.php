<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Consulta de datos técnicos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bienvenido a la base de datos técnicos!") }}
                </div>

                @foreach ($datos as $dato)
                    <div class="card mb-3">
                        <div class="card-body">
                            
                            <h5 class="card-text">{{ $dato->numero }}</h5> 
                                
                        </div>
                    </div>    
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
