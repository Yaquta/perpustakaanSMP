<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent_logs extends Model
{
    protected $table = "rent_logs";
    protected $fillable = ["id","anggota_id","book_id","rent_date","return_date","actual_return_date"];
    
}
