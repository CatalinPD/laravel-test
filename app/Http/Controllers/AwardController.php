<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AwardController extends Controller
{
    /**
     * display a list of movie awards
     */
    public function index()
    {
        // logic for one page

        $awards = [
            'Oscars',
            'Golden Globes',
            'Bafta',
            'Emmy'
        ];

        // compact('awards') === ['awards' => $awards]

        return view('awards/index', compact('awards'));
    }
}
