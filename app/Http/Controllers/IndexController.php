<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * the home page of the application
     */
    public function index()
    {
        // /resources/views/  index/index  .blade.php
        return view('index.index');
    }
}
