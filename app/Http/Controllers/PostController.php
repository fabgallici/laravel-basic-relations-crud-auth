<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use App\PostInformation;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate();

        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'category_id' => 'exists:categories,id'
        ]);

        $post = Post::create($validateData);
        
        $postInfo = new PostInformation;
        $postInfo->slug = $post->title;
        $postInfo->description = $validateData['description'];
        $postInfo->post()->associate($post);
        $postInfo->save();

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        dd('da creare');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = [
            'categories' => Category::all(),
            'post' => $post
        ];

        return view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        //aggiorno il post con tutti i data (lui prenderà solo quelli che interessano alla tabella posts, attraverso la variabile fillable che abbiamo messo nel model)
        $post->update($data);

        //Stessa cosa per i postinformation
        $post->postInformation->update($data);

        //ritorniamo alla home
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //Prima cancello la tabella associata, altrimenti non potrei cancellare post che è la tabella padre
        $post->postInformation->delete();

        $post->delete();

        return redirect()->back();
    }
}
