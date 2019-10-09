<!-- Comments Form -->

{{-- <comments-list></comments-list> --}}

{{-- <comments-list :user="{{ auth()->user() ?? 'undefined' }}"></comments-list> --}}
<comments-list :user="{{ auth()->user() ?? 'undefined' }}" :post_id="{{ $post_id }}"></comments-list>

