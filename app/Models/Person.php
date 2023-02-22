<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    // the table `people` does not have `created_at` and `updated_at` columns
    public $timestamps = false;
}
