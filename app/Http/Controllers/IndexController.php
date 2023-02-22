<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * the home page of the application
     */
    public function index()
    {
        // retrieve top 10 movies from the database
        // $movies = DB::select("
        //     SELECT *
        //     FROM `movies`
        //     WHERE `votes_nr` > ?
        //       AND `movie_type_id` = ?
        //     ORDER BY `rating` DESC
        //     LIMIT 10
        // ", [
        //     5000,
        //     1
        // ]);

        $genre = Genre::where('name', 'action')->first();

        $action_movies = $genre->movies()
            ->where('name', 'like', '%ator')
            ->limit(20)
            ->orderBy('year', 'asc')
            ->get();

        $movies = Movie::where('votes_nr', '>', 5000)
            ->where('movie_type_id', 1)
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get();

        $title = 'List of movies';

        // /resources/views/index/index.blade.php
        //                  index/index
        //                  index.index
        return view('index.index', compact('movies', 'title'));
    }
}
