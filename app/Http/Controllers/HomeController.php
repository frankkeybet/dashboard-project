<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('comments','user')->paginate(25);

        return view('home', compact('posts'));
    }
   
    //  public function post(Request $request, $slug)
    public function post(Request $request, Post $post) // Method 2
    {

    //    $post = Post::with('comments', 'user')->where('slug', $slug)->firstOrFail();
        return view('post', compact('post'));
    }

      public function about(Request $request)
    {

        return view('about');
    }

      public function contact(Request $request)
    {

        return view('contact');
    }
}
