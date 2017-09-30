<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create',
            [
                'categories' => Category::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
            'content' => 'required',
            'file' => 'required|max: 2048'
        ]);

        $post = new Post();
        $post->name = $request->input('name');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        $post->save();

        $file = $request->file()['file'];
        $file->storeAs('posts/', 'post_' . $post->id . '_img' . '.' . $file->getClientOriginalExtension() . '');
        $post->file = 'post_' . $post->id . '_img' . '.' . $file->getClientOriginalExtension() . '';
        $post->save();

        return redirect(route('main'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',
            [
                'post' => $post
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',
            [
                'post' => $post,
                'categories' => Category::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'file' => 'required|max: 2048'
        ]);

        $post->name = $request->input('name');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        $post->save();

        if ($request->file()) {
            $file = $request->file()['file'];
            $file->storeAs('posts/', 'post_' . $post->id . '_img' . '.' . $file->getClientOriginalExtension() . '');
            $post->file = 'post_' . $post->id . '_img' . '.' . $file->getClientOriginalExtension() . '';
            $post->save();
        }

        return redirect(route('main'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('main'));
    }
}
