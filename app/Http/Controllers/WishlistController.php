<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Maize\Markable\Models\Favorite;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlist()
    {
        $posts = Post::whereHasFavorite(
            auth()->user()
        )->get(); 
        // dd($posts);
        return view('wishlist',compact('posts'));
    }

    public function favoriteAdd($id)
    {
        $post = Post::find($id);
        $user = auth()->user();
        Favorite::add($post, $user);
        // session()->flash('success', 'Post was Added to Wishlist Successfully !');

        return redirect()->route('wishlist');
    }

    public function favoriteRemove($id)
    {
        $post = Post::find($id);
        $user = auth()->user();
        Favorite::remove($post, $user);
        // session()->flash('success', 'Post was Removed from Wishlist Successfully !');

        return redirect()->route('wishlist');
    }
}
