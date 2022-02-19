<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('back.pages.index');
    }

    public function main()
    {
        $posts= Post::all();
        $categories= Category::all();
        return view('front.main',compact('posts','categories'));
    }
    public function post($id)
    {
        $post= Post::find($id);
        $categories= Category::all();
        return view('front.post',compact('post','categories'));
    }

    public function search(Request $request)
    {
        $posts = Post::where('title', 'LIKE', '%'.$request->search.'%')
        ->get();
 
        $categories= Category::all();

        return view('front.main',compact('posts','categories'));
    }

    
}
