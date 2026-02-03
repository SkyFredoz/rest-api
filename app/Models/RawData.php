<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class RawData extends Model
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'raw_data';
    protected $guarded = [];
    protected $primaryKey = '_id';
    // protected $keyType = 'string';
    // protected $fillable = [
    //     'IdBundesland', 
    //     'Bundesland', 
    //     'Landkreis', 
    //     'Altersgruppe'
    // ];
}
