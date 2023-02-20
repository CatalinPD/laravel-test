<?php

namespace App\Http\Controllers;

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
        $movies = DB::select("
            SELECT *
            FROM `movies`
            WHERE `votes_nr` > ?
              AND `movie_type_id` = ?
            ORDER BY `rating` DESC
            LIMIT 10
        ", [
            5000,
            1
        ]);

        // /resources/views/index/index.blade.php
        //                  index/index
        //                  index.index
        return view('index.index', compact('movies'));
    }
}
