<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(){
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            
            if($usertype=='admin'){
                $users = User::where('id', '!=', auth()->user()->id)
                ->get();
                return view('admin.userlist', compact('users'))->with('i', (request()->input('page', 1)-1) *5);
            }
            else{
                return redirect()->back();
            }
        }
    }

    public function searchUser(Request $request)
    {
        
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            if($usertype=='admin'){
                $searchQuery = $request->input('search');
            
                $users = User::where(function ($query) use ($searchQuery) {
                    $query->where('name', 'like', '%' . $searchQuery . '%')
                        ->orWhere('email', 'like', '%' . $searchQuery . '%')
                        ->orWhere('id', 'like', '%' . $searchQuery . '%');
                })->where('id', '!=', Auth::user()->id)->get();

                return view('admin.userlist', ['users' => $users, 'searchQuery' => $searchQuery]);
            }else {
                abort(403, 'Unauthorized action.');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyUser(User $user)
    {
        $posts = Post::where('user_id', $user->id)->get();

        foreach ($posts as $post) {
            $post->delete();
        }
        $user->delete();
      
        return redirect()->route('userlist')
                        ->with('success','User deleted successfully');
    }
}
