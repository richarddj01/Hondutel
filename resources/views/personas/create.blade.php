<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Persona') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('personas.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="identidad" class="block text-sm font-medium text-gray-700">Identidad</label>
                                <input type="text" name="identidad" id="identidad" autocomplete="identidad" class="mt-1 p-2 block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="primer_nombre" class="block text-sm font-medium text-gray-700">Primer Nombre</label>
                                <input type="text" name="primer_nombre" id="primer_nombre" autocomplete="primer_nombre" class="mt-1 p-2 block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required>
                            </div>

                            <!-- Agrega los campos restantes aquí -->
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
