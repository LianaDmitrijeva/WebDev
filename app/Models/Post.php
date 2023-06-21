<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'author', 
        'price', 
        'description', 
        'image', 
        'user_id', 
        'condition'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
