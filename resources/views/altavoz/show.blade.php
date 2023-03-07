<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="flex items-center text-3xl font-semibold text-gray-700 mb-5">Detalles del Altavoz</h2>

                    <div class="mt-10 flex justify-evenly justify-items-center mx-10">
                        <div class="flex-col w-full px-8">
                            <img src="{{ asset($url . $altavoz->foto) }}" alt="{{ $altavoz->nombre }}">
                        </div>
                        <div class="flex-col w-full px-6">
                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Precio:') }}</h3>
                                <h4 class="text-xl inline-block">{{ $altavoz->precio }}<h4>
                            </div>
                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Modelo:') }}</h3>
                                <h4 class="text-xl inline-block">{{ $altavoz->modelo }}<h4>
                            </div>
                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Marca:') }}</h3>
                                <h4 class="text-xl inline-block">{{ $altavoz->marca }}<h4>
                            </div>

                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Descripción:') }}</h3>
                                <h4 class="text-lg inline-block text-justify">{{ $altavoz->descripcion }}<h4>
                            </div>


{{--
                             @if ($alquiler)
                                <button type="button"
                                    class="text-white mt-6 bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                    disabled>
                                    Altavoz alquilado
                                </button>
                            @else
                                <form action="{{ route('alquiler.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value='{{ $altavoz->id }}'>
                                    <button type="submit"
                                        class="text-white mt-6 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                        Solicitar Alquiler
                                    </button>
                                </form>
                            @endif
--}}



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
