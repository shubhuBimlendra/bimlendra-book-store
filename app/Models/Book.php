<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
