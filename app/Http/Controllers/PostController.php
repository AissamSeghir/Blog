<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::select('id','name')->get();
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'categories' => 'array',
        ]);
    
        $data = $request->all();
        $data['user_id'] = Auth::id();
    
        $post = Post::create($data);
    
        if ($request->has('categories')) {
            $post->categories()->attach($request->categories);
        }
    
        return redirect('/dashboard');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Categorie::select('id','name')->get();
        $postcateg= $post->categories()->pluck('categorie_id')->toArray();
        return view('posts.edit',compact('categories','post','postcateg'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        $post->categories()->sync($request->categories);
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/dashboard');
    }
}
