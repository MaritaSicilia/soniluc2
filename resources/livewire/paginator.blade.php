<div>
    <ul>
        @foreach ($results as $result)
            <li>{{ $result->name }}</li>
        @endforeach
    </ul>

    {{ $results->links() }}
</div>
