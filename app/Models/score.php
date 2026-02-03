<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Score extends Model
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'scores';
}
