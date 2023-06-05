<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="flex items-center text-3xl font-semibold text-gray-700 mb-5">Editar Altavoz</h2>

                    <div class="w-3/4 mx-auto">
                        <form action="{{ route('altavoz.update', $altavoz->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block"
                                    for="precio">Precio:</label><br>
                                <input type="text" name="precio" id="precio" class="form-control w-full"
                                    value="{{ $altavoz->precio }}">
                                @error('precio')
                                    {{ $errors->first('precio') }}
                                @enderror
                            </div>
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block"
                                    for="modelo">Modelo:</label><br>
                                <input type="text" name="modelo" id="modelo" class="form-control w-full"
                                    value="{{ $altavoz->modelo }}">
                                    @error('modelo')
                                    {{ $errors->first('modelo') }}
                                @enderror
                            </div>
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block"
                                    for="marca">Marca:</label><br>
                                <input type="text" name="marca" id="marca" class="form-control w-full"
                                    value="{{ $altavoz->marca }}">
                                    @error('marca')
                                    {{ $errors->first('marca') }}
                                @enderror
                            </div>

                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block"
                                    for="foto">Foto:</label><br>
                                <input type="file" name="foto" id="foto" class="form-control-file w-full">
                                <img src="{{ asset($url . $altavoz->foto) }}" alt="{{ $altavoz->titulo }}"
                                    width="100">
                                    @error('foto')
                                    {{ $errors->first('foto') }}
                                @enderror
                            </div>
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block"
                                    for="descripcion">Descripción:</label><br>
                                <textarea name="descripcion" id="descripcion" class="form-control w-full h-40">{{ $altavoz->descripcion }}</textarea>
                                @error('descripcion')
                                    {{ $errors->first('descripcion') }}
                                @enderror
                            </div>
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
