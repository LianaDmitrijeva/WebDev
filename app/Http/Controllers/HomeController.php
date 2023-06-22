<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            
            if($usertype=='user'){
                $posts = Post::where('user_id', auth()->user()->id)->latest()->paginate(3);
                return view('dashboard', compact('posts'))->with('i', (request()->input('page', 1)-1) *5);
            }
            else if($usertype=='admin'){
                $posts = Post::latest()->get();
                return view('admin.adminhome', compact('posts'))->with('i', (request()->input('page', 1)-1) *5);
            }
            else{

                
                return redirect()->back();
            }
        }
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'price' => 'required',
            'condition' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:200',
            ]);
            
            $input = $request->all();
            
            if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
            }
            
            $input['user_id'] = $user->id; // Assigning the user ID
            Post::create($input);
            
            return redirect()->route('home')->with('success','Post created successfully.');
     }

     public function show(Post $post)
     {
        return view('show',compact('post'));
     }

     public function edit(Post $post)
     {
        return view('edit',compact('post'));
     }
     
     public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'price' => 'required',
            'condition' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:200',
            ]);
   
        $input = $request->all();
   
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
           
        $post->update($input);
     
        return redirect()->route('home')
                        ->with('success','Post updated successfully');
    }
    public function destroy(Post $post)
    {
        $post->delete();
      
        return redirect()->route('home')
                        ->with('success','Post deleted successfully');
    }

    public function search(Request $request)
    {
        
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            if($usertype=='user'){
                $searchQuery = $request->input('search');
            
                $posts = Post::where(function ($query) use ($searchQuery) {
                    $query->where('name', 'like', '%' . $searchQuery . '%')
                          ->orWhere('author', 'like', '%' . $searchQuery . '%')
                          ->orWhere('price', 'like', '%' . $searchQuery . '%')
                          ->orWhere('condition', 'like', '%' . $searchQuery . '%');
                })->where('user_id', '!=', auth()->user()->id)->get();
                return view('feed', compact('posts', 'searchQuery'));
            }
            else if($usertype=='admin'){
                $searchQuery = $request->input('search');
            
                $posts = Post::where('name', 'like', '%' . $searchQuery . '%')
                            ->orWhere('author', 'like', '%' . $searchQuery . '%')
                            ->orWhere('price', 'like', '%' . $searchQuery . '%')
                            ->orWhere('condition', 'like', '%' . $searchQuery . '%')
                            ->get();
                return view('admin.adminhome', compact('posts', 'searchQuery'));
            }
        }
    }

}
