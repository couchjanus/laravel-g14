@extends('layouts.blog')

@section('title')
  {{$post->title}}
@endsection

@section('content')
    <div class="blog-main">
      @includeIf('blog.partials._single-post', ['post' => $post])
      {{-- comments --}}
      @includeWhen($hascomments, 'blog.partials._comments', ['post_id' => $post->id])
    </div>
@endsection
