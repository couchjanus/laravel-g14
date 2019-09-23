<!-- resources/views/blog/show.blade.php -->
@extends('layouts.blog')

@section('title')
	Blog Post | {{ $post->title }}
@endsection

@section('content')

  <!-- Latest Posts -->
  @include('blog.partials._single')
    
  @push('sidebar')
    <li>Sidebar list item</li>
  @endpush

  @prepend('sidebar')
    <li>First Sidebar Item</li>
  @endprepend


@endsection
