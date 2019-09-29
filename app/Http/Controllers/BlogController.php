<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Enums\PostType;
use Illuminate\Support\Facades\Date;

class BlogController extends Controller
{
    public function index()   
    {
        $posts = Post::paginate();
 
        return view('blog.index', compact('posts'))->withTitle('Awesome Blog');
    }

    public function show($slug)
    {
        if (is_numeric($slug)) {
            $post = Post::findOrFail($slug);
            return Redirect::to(route('blog.show', $post->slug), 301);
        }
        
        $post = Post::whereSlug($slug)->firstOrFail();
        $post->update(['visited'=>$post->visited+1]);
        return view('blog.show', ['post' => $post, 'hescomment'=>true]);
    }

    public function getPostsByCategory($categoryId)   {
        $posts = Post::where([
                        'status' => PostType::Published, 
                        'category_id' => $categoryId
                    ])
                    ->with('category')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(5);
        return view('blog.index')->with(compact('posts'))->withTitle('Awesome Blog');
    } 
}
