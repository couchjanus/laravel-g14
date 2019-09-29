<!-- resources/views/blog/index.blade.php -->
@extends('layouts.blog')

@section('title')
	Blog
@endsection

@section('content')
<h1>{{ $title }}</h1>
<div class="row">
    <!-- post -->
    @forelse ($posts as $post)
        @include('blog.partials._chunk')
    @empty
        @include('blog.partials._post-none')
    @endforelse
</div>
<!-- Pagination -->
{{-- {{ $posts->links() }} --}}
{{-- {!! $posts->render() !!} --}}
{{ $posts->onEachSide(2)->links() }}
@endsection
