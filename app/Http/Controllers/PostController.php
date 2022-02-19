<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('back.pages.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('back.pages.post.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $post =  Post::create([
            'title' => $request->title,
            'details' => $request->details,
            'date' => $request->date,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            
                $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
                $image_name = $timestamp . $image->getClientOriginalName();
                $image->move(public_path('assets/uploads/post'), $image_name);
                $image = $image_name;

                $post->image=$image;
                
            
        }
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('back.pages.post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'details' => $request->details,
            'date' => $request->date,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasfile('image')) { 

            $exsitImage = Post::find($post->id);
            $filePath = public_path('assets/uploads/post/');
            
                if (file_exists($filePath . $exsitImage->image)) {
                    unlink($filePath . $exsitImage->image);
                }
                $image = $request->file('image');
                $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
                $image_name = $timestamp . $image->getClientOriginalName();
                $image->move(public_path('/assets/uploads/post/'), $image_name);
                $image = $image_name;
                $post->image=$image;
               
            
        }
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->back();
    }
}
