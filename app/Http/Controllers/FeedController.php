<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            
            if($usertype=='user'){
                $posts = Post::paginate(10);
                return view('feed', compact('posts'))->with('i', (request()->input('page', 1)-1) *5);
            }
            else if($usertype=='admin'){
                return view('admin.adminhome');
            }
            else{
                return redirect()->back();
            }
        }
    }

    public function show(Post $post)
    {
       return view('show',compact('post'));
    }
}