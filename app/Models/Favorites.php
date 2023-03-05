<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    public $_fillable = [
        'reader_id',
        'book_id'
    ];
    use HasFactory;
}
