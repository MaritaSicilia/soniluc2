<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir Altavoz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200">
                    <form method="POST" action="{{ route('altavoz.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label for="precio" class="block mb-2 text-sm font-medium text-gray-900">Precio</label>
                            <input type="text" id="precio" name="precio"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        @error('precio')
                            {{ $errors->first('precio') }}
                        @enderror
                        <div class="mb-6">
                            <label for="marca" class="block mb-2 text-sm font-medium text-gray-900">Marca</label>
                            <input type="text" id="marca" name="marca"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        @error('marca')
                            {{ $errors->first('marca') }}
                        @enderror
                        <div class="mb-6">
                            <label for="modelo" class="block mb-2 text-sm font-medium text-gray-900">Modelo</label>
                            <input type="text" id="modelo" name="modelo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        @error('modelo')
                            {{ $errors->first('modelo') }}
                        @enderror
                        <div class="mb-6">
                            <label for="foto" class="block mb-2 text-sm font-medium text-gray-900">Foto</label>
                            <input type="file" id="foto" name="foto"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        @error('foto')
                            {{ $errors->first('foto') }}
                        @enderror
                        <div class="mb-6">
                            <label for="descripcion"
                                class="block mb-2 text-sm font-medium text-gray-900">Descripcion</label>
                            <textarea id="descripcion" name="descripcion"
                                class="bg-gray-50 border h-40 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
                        </div>
                        @error('descripcion')
                            {{ $errors->first('descripcion') }}
                        @enderror
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Añadir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
