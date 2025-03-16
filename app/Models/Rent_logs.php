<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Anggota;
use Illuminate\Database\Eloquent\Model;

class Rent_logs extends Model
{
    protected $table = "rent_logs";
    protected $fillable = ["id","anggota_id","book_id","rent_date","return_date","actual_return_date"];
    

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
