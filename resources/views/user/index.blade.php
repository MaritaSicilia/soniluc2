<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="flex items-center text-3xl font-semibold text-gray-700 mb-5">Listado de Usuarios</h2>
                    <!--Aquí va el botón de añadir usuario
                            <form action=" { { route('user.create') }}" method="get">
                                <button type="submit"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                                <i class="fa-solid fa-user-plus"></i> Añadir usuario</button>
                            </form>
-->

                    <x-nav-link :href="route('user.create')" :active="request()->routeIs('user.create')"
                        class="text-white bg-blue-700 hover:bg-white-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-white-700 dark:focus:ring-blue-800">
                        {{ __('Crear Usuario') }}
                    </x-nav-link>
                    <div class="relative my-5">

                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Apellidos
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        DNI
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Dirección
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Teléfono
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Año Nacimiento
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Rol
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                    <tr class="bg-white border-b">
                                        <th scope="row" class="px-6 py-4">
                                            {{ $user->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $user->surname }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->dni }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->address }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->phone }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->fechanac }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->rol }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('user.edit', ['user' => $user->id]) }}">
                                                <button type="button"
                                                    class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                                                    Editar
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <!--Para el botón de borrar que va por post en la ruta. Hay que incluirle el method delete. Lleva a al LibrosController al método de destroy -->
                                                <form class="inline-block"
                                                    action="{{ route('user.destroy', ['user' => $user->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit"
                                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
                                                        value="Eliminar">
                                                </form>
                                                <a href="{{ route('user.show', ['user' => $user->id]) }}">
                                                <button type="button"
                                                class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                                                Prestamos
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            </a>
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
