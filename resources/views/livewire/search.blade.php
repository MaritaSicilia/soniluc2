<div>
    <div>
        Buscar por Marca:<x-text-input wire:model='buscar' class="border-4"/>
    </div>

    <div class="relative overflow-x-auto mt-5">
        @if ($misaltavoces->count())
            @foreach ($misaltavoces as $mialtavoz)
                <a href="{{ route('altavoz.show', ['altavoz' => $mialtavoz->id]) }}" class="group">
                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray xl:aspect-w-7 xl:aspect-h-8">
                        <img class="rounded-t-lg w-50 h-96" src="{{ asset($url.$mialtavoz->foto) }}" alt="" />
                    </div>
                    <p class="mt-1 text-lg font-medium text-gray-900">{{ $mialtavoz->modelo }}</p>
                    <h3 class="mt-4 text-sm text-gray-700">{{ $mialtavoz->marca }}</h3>

                </a>
            @endforeach
        @else
            <p>No se ha encontrado ningún altavoz</p>
        @endif
        <div>
            {{ $misaltavoces->links() }}
        </div>
    </div>
</div>
