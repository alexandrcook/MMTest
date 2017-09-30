<?php

namespace App\Http\Controllers;

use App\Comment;
use Validator;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'author' => array(
                    'required',
                    "regex: /([A-Z][a-z]+\s+[A-Z][a-z]+)/"
                ),
                'content' => 'required',
            ]);
            if ($validator->passes()) {

                $comment = new Comment();
                $comment->author = $request->input('author');
                $comment->content = $request->input('content');
                $comment->post_id = $request->input('post_id');
                $comment->category_id = $request->input('category_id');
                $comment->save();

                return response()->json(
                    [
                        'responseText' => 'Success!',
                        'created_at' => $comment->created_at->format('Y-m-d H:i:s')
                    ]
                );
            } else {
                return response()->json(['error' => $validator->errors()->all()], 400);
            }
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
