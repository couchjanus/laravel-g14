<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{

    public function index()
    {
        // $posts = DB::select('select * from posts');
        $posts = DB::table('posts')->get();

        return view('blog.index', ['posts' => $posts, 'title'=>'Hello there! It’s a Blog!']);
    }

    public function show($id)
    {
        // $post = DB::select("select * from posts where id = :id", ['id' => $id]);
        
        $post = DB::table('posts')->where('id', $id)->first();

        return view('blog.show', ['post' => $post]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        DB::table('posts')->insert(
            ['title' => $request['title'], 'votes' => 10, 'content' => $request['content'],  'category_id' => 1]
        );
    }

    public function edit($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('blog.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        DB::table('posts')
              ->where('id', $id)
              ->update(['title' => $request['title'], 'votes' => 10, 'content' => $request['content'],  'category_id' => 1]);
    }
 
}
