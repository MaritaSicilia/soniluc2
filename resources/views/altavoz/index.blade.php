<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="flex items-center text-3xl font-semibold text-gray-700 mb-5">Altavoces</h2>
                    @if(auth()->user()->rol == 'admin')
                    <x-nav-link :href="route('altavoz.create')" :active="request()->routeIs('altavoz.create')" class="text-white bg-blue-700 hover:bg-white-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-white-700 dark:focus:ring-blue-800">
                        {{ __('Crear') }}
                    </x-nav-link>
                    @endif
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Precio
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Modelo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Marca
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Descripcion
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($altavoces as $altavoz)
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4">{{ $altavoz->precio }}</td>
                                        <td class="px-6 py-4">{{ $altavoz->modelo }}</td>
                                        <td class="px-6 py-4">{{ $altavoz->marca }}</td>
                                        <td class="px-6 py-4">{{ $altavoz->descripcion }}</td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('altavoz.show', ['altavoz' => $altavoz->id]) }}"
                                                class="font-medium  text-green-600 dark:text-green-600 hover:underline">Mostrar</a>
                                                @if(auth()->user()->rol == 'admin')
                                            <a href="{{ route('altavoz.edit', ['altavoz' => $altavoz->id]) }}"
                                                class="font-medium  text-yellow-600 dark:text-yellow-500 hover:underline">Editar</a>
                                                @endif
                                            <form class="inline-block"
                                            action="{{ route('alquiler.store', ['id' => $altavoz->id]) }}"
                                                method="POST">
                                                <input type="hidden" name="id_altavoz" id="id_altavoz"
                                                    value="{{ $altavoz->id }}">
                                                @csrf
                                                <button type="submit"
                                                    class="font-medium text-purple-600 dark:text-purple-500 hover:underline">Alquilar</button>
                                            </form>
                                            @if(auth()->user()->rol == 'admin')

                                            <form class="inline-block"
                                                action="{{ route('altavoz.destroy', ['altavoz' => $altavoz->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Borrar</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
