<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="flex items-center text-3xl font-semibold text-gray-700 mb-5">Editar usuario</h2>
                    <!--Formulario con el usuario a editar-->
                    <div class="w-3/4 mx-auto">
                        <form action="{{ route('user.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block"
                                    for="name">Nombre:</label><br>
                                <input type="text" name="name" id="name" class="form-control w-full"
                                    value="{{ $user->name }}">
                            </div>
                            @error('name')
                                {{ $errors->first('name') }}
                            @enderror
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block"
                                    for="surname">Apellidos:</label><br>
                                <input type="text" name="surname" id="surname" class="form-control w-full"
                                    value="{{ $user->surname }}">
                            </div>
                            @error('surname')
                                {{ $errors->first('surname') }}
                            @enderror
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block"
                                    for="dni">Dni:</label><br>
                                <input type="text" name="dni" id="dni" class="form-control w-full"
                                    value="{{ $user->dni }}">
                            </div>
                            @error('dni')
                                {{ $errors->first('dni') }}
                            @enderror
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block"
                                    for="address">Dirección:</label><br>
                                <input type="text" name="address" id="address" class="form-control w-full"
                                    value="{{ $user->address }}">
                            </div>
                            @error('address')
                                {{ $errors->first('address') }}
                            @enderror
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block"
                                    for="phone">Teléfono:</label><br>
                                <input type="text" name="phone" id="phone" class="form-control w-full"
                                    value="{{ $user->phone }}">
                            </div>
                            @error('phone')
                                {{ $errors->first('phone') }}
                            @enderror
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block"
                                    for="fecha_nac">Fecha Nacimiento:</label><br>
                                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control w-full"
                                    value="{{ $user->fecha_nac }}">
                            </div>
                            @error('fecha_nac')
                                {{ $errors->first('fecha_nac') }}
                            @enderror
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block"
                                    for="email">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control w-full"
                                    value="{{ $user->email }}">
                            </div>
                            @error('email')
                                {{ $errors->first('email') }}
                            @enderror

                            <button type="submit my-6"
                                class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Guardar
                                cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
