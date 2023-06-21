<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class WelcomeController extends Controller
{
    public function index(){

        $posts = Post::latest()->paginate(5);
         return view('welcome', compact('posts'))->with('i', (request()->input('page', 1)-1) *5);
            
    }
}