<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $builder = Movie::orderBy('name') // start building the query
            ->limit(20);                  // add something to the query

        $builder->where('name', 'like', 'The %'); // add something to the query

        // build and execute the query, return results
        $movies = $builder->get();


        $movies = Movie::query()
            ->where('name', 'like', 'The %')
            ->orderBy('name')
            ->limit(20)
            ->get();

        $sorted_unique_years =
            $movies             // collection of Movie objects
            ->pluck('year')     // (new) collection of their years
            ->unique()          // collection of the years after removing duplicate values
            ->sort();           // collection of the years after removing duplicate values, sorted

        return view('movies.index', compact('movies'));
    }

    public function topRated()
    {
        $query = "
            SELECT *
            FROM `movies`
            WHERE `votes_nr` >= ?
                AND `movie_type_id` = ?
            ORDER BY `rating` DESC
            LIMIT 50
        ";

        $movies = DB::select($query, [5000, 1]);

        return view('movies.top-rated', [
            'movies' => $movies
        ]);
    }

    public function shawshank()
    {
        // $movie = DB::selectOne('
        //     SELECT *
        //     FROM `movies`
        //     WHERE `id` = ?
        // ', [
        //     111161
        // ]);

        $movie = Movie::findOrFail(111161);

        $all_people = DB::select("
            SELECT `positions`.`name` AS position_name, `people`.*
            FROM `movie_person`
            LEFT JOIN `positions`
                ON `movie_person`.`position_id` = `positions`.`id`
            LEFT JOIN `people`
                ON `movie_person`.`person_id` = `people`.`id`
            WHERE `movie_person`.`movie_id` = ?
        ", [
            $movie->id
        ]);

        $people_sorted_by_position = [];
        foreach ($all_people as $person) {
            $people_sorted_by_position[$person->position_name][] = $person;
        }

        return view('movies.detail', [
            'movie' => $movie,
            'people' => $people_sorted_by_position
        ]);
    }

    public function search()
    {
        if (isset($_GET['search'])) {

            $search_term = $_GET['search'];

            $results = DB::select("
                SELECT *
                FROM `movies`
                WHERE `name` LIKE ?
                ORDER BY `name` ASC
            ", [
                '%' . $search_term . '%'
            ]);

        } else {

            // no searching
            $search_term = '';
            $results = [];
        }

        return view('movies.search', [
            'search_term' => $search_term,
            'results' => $results
        ]);
    }

    public function actionMovies()
    {
        $query = "
            SELECT `movies`.*
            FROM `genre_movie`
            LEFT JOIN `movies`
                ON `genre_movie`.`movie_id` = `movies`.`id`
            WHERE `genre_movie`.`genre_id` = ?
                AND `votes_nr` >= ?
                AND `movie_type_id` = ?
            ORDER BY `rating` DESC
            LIMIT 50
        ";

        $movies = DB::select($query, [31, 5000, 1]);

        return view('movies.top-rated-genre', [
            'genre_name' => 'Action movies',
            'movies' => $movies
        ]);
    }

    public function moviesOfGenre()
    {
        $genre_slug = $_GET['genre'];

        $genre_query = "
            SELECT *
            FROM `genres`
            WHERE `slug` = ?
            LIMIT 1
        ";

        $genre = DB::selectOne($genre_query, [$genre_slug]);

        if (!$genre) {
            // if genre with the given slug was not found
            // abort with 404 error code
            abort(404);
        }

        $query = "
            SELECT `movies`.*
            FROM `genre_movie`
            LEFT JOIN `movies`
                ON `genre_movie`.`movie_id` = `movies`.`id`
            WHERE `genre_movie`.`genre_id` = ?
                AND `votes_nr` >= ?
                AND `movie_type_id` = ?
            ORDER BY `rating` DESC
            LIMIT 50
        ";

        $movies = DB::select($query, [$genre->id, 5000, 1]);

        return view('movies.top-rated-genre', [
            'genre_name' => $genre->name . ': movies',
            'movies' => $movies
        ]);
    }
}
