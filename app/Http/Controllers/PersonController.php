<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * list of (some) people
     */
    public function index()
    {
        $people = Person::query()                   // FROM `people`
            ->where('fullname', 'like', 'Tom H%')   // WHERE `fullname` LIKE 'Tom H%'
            ->orderBy('fullname')                   // ORDER BY `fullname` ASC
            ->get();                                // SELECT *

        return view('people.index', compact('people'));
    }

    /**
     * displays a form to create a new person
     */
    public function create()
    {
        $person = new Person;

        // displays the form
        return view('people.create', compact('person'));
    }

    /**
     * handles submission of create
     */
    public function insert()
    {
        $person = new Person;

        $person->fullname = $_POST['fullname'];

        $person->save();

        // always redirects
        return redirect()->route('people.index');
    }
}
