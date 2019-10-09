<?php

namespace App\Http\Controllers;

use App\Comment;
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
        $comments = Comment::with('author')
            ->orderByDesc('id')
            ->get();

        return response($comments, 200);
    }

    public function postsById($id)
    {
        $comments = Comment::where('post_id', $id)->with('author')
            ->orderByDesc('id')
            ->get();
        return response($comments, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => 'required|string',
            'post_id' => 'required'
        ]);
                
        $comment = auth()->user()
            ->comments()
            ->create($data);

        $comment->load('author');

        return response($comment, 200);
    }
}
