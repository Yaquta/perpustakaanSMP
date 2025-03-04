<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;


class Anggota extends Model
{   
    // use Sluggable;
    use SoftDeletes;
    protected $fillable = [
        "username",
        "NISN",
        "address",
        "phone",
    ] ;
}
