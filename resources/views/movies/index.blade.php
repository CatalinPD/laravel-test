@include('common.html-start')

    <a href="{{ route('homepage') }}">Home</a>

    <a href="{{ route('movies.index') }}">
        List of movies
    </a>

    <h1>Movies that begin with "The"</h1>
    <ul>
        @php
            $movies = $movies->sort();


        @endphp

        @foreach ($movies as $movie)
            <li>
                <a href="{{ route('movies.show', $movie->id) }}">
                    {!! $movie->name !!}
                    ({{ $movie->year }})
                </a>
            </li>
        @endforeach
    </ul>

    <!-- This appears in the HTML code -->
    {{-- This does NOT appear in the HTML code  --}}

    <h2>Choose a year to filter the results</h2>

    <ul>
        @foreach($movies->pluck('year')->unique()->sort() as $year)
            <li>
                {{ $year }}
            </li>
        @endforeach
    </ul>

@include('common.html-end')