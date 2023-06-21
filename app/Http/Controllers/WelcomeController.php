<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        if(Auth::id()){
            $posts = Post::all();
            return view('feed', compact('posts'));
        }else{
        $posts = Post::all();
        return view('welcome', compact('posts'));
    }
    }

    public function searchwelcome(Request $request)
    {
        $searchwelcome = $request->input('searchwelcome');
        
        $posts = Post::where('name', 'like', '%' . $searchwelcome . '%')
                        ->orWhere('author', 'like', '%' . $searchwelcome . '%')
                        ->orWhere('price', 'like', '%' . $searchwelcome . '%')
                        ->orWhere('condition', 'like', '%' . $searchwelcome . '%')
                        ->get();
        
        return view('welcome', compact('posts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}