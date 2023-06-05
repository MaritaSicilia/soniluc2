<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200">
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        @error('name')
                            {{ $errors->first('name') }}
                        @enderror
                        <div class="mb-6">
                            <label for="surname" class="block mb-2 text-sm font-medium text-gray-900">Apellido</label>
                            <input type="text" id="surname" name="surname"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        @error('surname')
                            {{ $errors->first('surname') }}
                        @enderror
                        <div class="mb-6">
                            <label for="dni" class="block mb-2 text-sm font-medium text-gray-900">DNI</label>
                            <input type="text" id="dni" name="dni"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        @error('dni')
                            {{ $errors->first('dni') }}
                        @enderror
                        <div class="mb-6">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Dirección</label>
                            <input type="text" id="address" name="address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        @error('address')
                            {{ $errors->first('address') }}
                        @enderror
                        <div class="mb-6">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Teléfono</label>
                            <input id="phone" name="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        @error('phone')
                            {{ $errors->first('phone') }}
                        @enderror
                        <div class="mb-6">
                            <label for="fechanac" class="block mb-2 text-sm font-medium text-gray-900">Fecha
                                Nacimiento</label>
                            <input type="date" id="fechanac" name="fechanac"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        @error('fechanac')
                            {{ $errors->first('fechanac') }}
                        @enderror
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="text" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        @error('email')
                            {{ $errors->first('email') }}
                        @enderror
                        <div class="mb-6">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                            <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        @error('password')
                            {{ $errors->first('password') }}
                        @enderror


                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Añadir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
