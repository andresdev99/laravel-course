<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request){
        $search = $request->search;
        $posts = Post::where('title', 'LIKE', "%{$search}%")
        ->with('user')
        ->latest()->paginate();    
        return view("home",  ['posts' => $posts]);
    }
    
    public static function print($thing){
        echo "<pre>";
        print_r($thing);
        echo "</pre>";
    }
    // public function blog(){
    //     //$posts = Post::get();
    //     //$posts = Post::first();
    //     //$posts = Post::find(25);
    //     //dd($posts);
    //     $posts = Post::latest()->paginate();    
    //     return view('blog', ['posts' => $posts]);
    // }
    
    public function post(Post $post){
        return view('post', ['post' => $post]);
    }
}
