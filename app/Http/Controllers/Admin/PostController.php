<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use App\Enums\PostType;
use Validator;
use Auth;
use App\Http\Requests\UpdatePostFormRequest;
use Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Blog Post Management';
        $posts = Post::paginate();
        $status = PostType::toSelectArray();
        return view('admin.posts.index', compact('posts', 'title', 'status'));
    }

    public function getPostsByStatus(Request $request)
    {
        $title = 'Blog Post Management By Status';
        static $statusPost;
        $status = PostType::toSelectArray();
        $statusPost = $request->status; 
        $posts = Post::status($statusPost)->paginate(10);
        return view('admin.posts.index', compact('title', 'posts', 'status', 'statusPost'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Post";
        $categories = Category::all(); 
        $tags = Tag::all();
        $status = PostType::toSelectArray(); 
        return view('admin.posts.create', compact('title'))->withStatus($status)->withCategories($categories)->withTags($tags);

        // $user = \Auth::user();
        // if ($user->can('create', Post::class)) {
        //     $categories = Category::all(); 
        //     $status = PostType::toSelectArray(); 
        //     $tags = Tag::all();
        //     return view('admin.posts.create', compact('title'))->withStatus($status)->withCategories($categories)->withTags($tags);
        // } else {
        //     return redirect(route('admin.posts.index'))->with('warning','You can not create post');
        // }
        
        // if ($this->authorize('create', Post::class)) {
        //     echo 'Current logged in user is allowed to create new posts.';
        // } else {
        //     echo 'You can not create post';
        // }
        // exit;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.posts.create'))
                    ->withErrors($validator)
                    ->withInput();
        }

        $post = Post::firstOrCreate([
            'title' => $request->title, 
            'content'=>$request->content, 
            'status'=>$request->status, 
            'category_id'=>$request->category_id, 
            'user_id'=>Auth::id()]);

        $post->tags()->sync((array)$request->input('tag'));

        return redirect(route('admin.posts.index'))->with('message','Post has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \Auth::user();
        if ($this->authorize('view', $post)) {
            return view('admin.posts.show',compact('post'));
        } else {
            return redirect(route('admin.posts.index'))->with('warning','Not Allowed View Post');
        }
        // if ($user->can('view', $post)) {
        //   echo "Current logged in user is allowed to update the Post: {$post->title}";
        // } else {
        //   echo 'Not Authorized.';
        // }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id'); 
        $tags = Tag::get()->pluck('name', 'id');
        $status = PostType::toSelectArray(); 
        return view('admin.posts.edit')->withTitle('Edit Post')->withPost($post)->withStatus($status)->withCategories($categories)->withTags($tags);

        // if (Gate::allows('update-post', $post)) {
        //     $categories = Category::pluck('name', 'id'); 
        //     $status = PostType::toSelectArray(); 
        //     $tags = \App\Tag::get()->pluck('name', 'id');
        //     return view('admin.posts.edit')->withTitle('Edit Post')->withPost($post)->withStatus($status)->withCategories($categories)->withTags($tags);
        // } else {
        //     return redirect(route('admin.posts.index'))->with('warning','Not Allowed Edit Post');
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostFormRequest $request, Post $post)
    {
        // $user = \Auth::user();
        // if ($user->can('update', $post)) {
        // $post->update($request->all());
        // $post->tags()->sync((array)$request->input('tag'));
        // return redirect(route('admin.posts.index'))->with('message','Post has been updated successfully');
        // } else {
        //     return redirect(route('admin.posts.index'))->with('warning',"Current logged in user is not allowed to update the Post: {$post->id}");
        // }

        $post->update($request->all());
        $post->tags()->sync((array)$request->input('tag'));
        return redirect(route('admin.posts.index'))->with('message','Post has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success','Post deleted successfully');

        // $user = Auth::user();
        
        // if ($user->can('delete', $post)) {
        //     $post->tags()->detach();
        //     $post->delete();
        //     return redirect()->route('admin.posts.index')->with('success','Post deleted successfully');
        // } else {
        //     return redirect()->route('admin.posts.index')->with('warning','Пользователь '.$user->name.' не может удалять статью...');
        // }
        
        // if (Gate::forUser($user)->denies('destroy-post', $post)) {
        //     // Пользователь не может удалять статью...
        //     // dd('Пользователь '.$user->name.' не может удалять статью...');
        //     return redirect()->route('posts.index')->with('warning','Пользователь '.$user->name.' не может удалять статью...');
        // } else {
        // $post->tags()->detach();
        // $post->delete();
        // return redirect()->route('posts.index')->with('type','success')->with('message','Post deleted successfully');
        // }

    }
}
