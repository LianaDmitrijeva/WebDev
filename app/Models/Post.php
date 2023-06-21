<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*********************** Wishlist ***********************/
use Maize\Markable\Markable;        
use Maize\Markable\Models\Favorite; 

class Post extends Model
{
    use HasFactory, Markable;  //   'Markable' - Wishlist

    protected $fillable = [
        'name', 
        'author', 
        'price', 
        'description', 
        'image', 
        'user_id', 
        'condition'
    ];

/*********************** Wishlist ***********************/
    protected static $marks = [
        Favorite::class,            
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
