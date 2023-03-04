<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'production_year',
        'price',
        'category',
        'investigator',
        'writer',
        'publisher_id'
    ];
    public function publishing()
    {
        return $this->belongsTo(Publisher::class);
    }
    public function reader()
    {
        return $this->belongsToMany(Reader::class, 'favorites', 'reader_id', 'book_id');
    }
}
