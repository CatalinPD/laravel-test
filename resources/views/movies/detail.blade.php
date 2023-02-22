@include('common.html-start', [
    'title' => $movie->name . ' (' . $movie->year . ')'
])

    <h1>{{ $movie->name }}</h1>

    <div class="year">
        {{ $movie->year }}
    </div>


    {{-- @if ($movie->rating > 8)
        <h2>Top rated movie</h2>
    @endif

    <h2>Type: {{ $movie->movieType->name }}</h2>

    <h2>Genres</h2>

    <ul>
        @foreach ($movie->genres as $genre)
            <li>{{ $genre->name }}</li>
        @endforeach
    </ul> --}}

    {{-- the client is stupid --}}
    <!-- the boss is stupid -->
    {{-- <h2>Cast & crew</h2>

    @foreach ($people as $position_name => $position_people)

        <h3>{{ $position_name }}</h3>

        <ul>
            @foreach ($position_people as $person)
                <li>
                    <a href="{{ route('detail of a person', $person->id) }}">
                       {{ $person->fullname }}
                    </a>
                </li>
            @endforeach
        </ul>

    @endforeach --}}

@include('common.html-end')