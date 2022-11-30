<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price', 'version', 'description', 'image', 'category_id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
