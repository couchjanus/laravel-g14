<div class="blog-post">
   <h2 class="blog-post-title">{{ $post->title }}</h2>
   <p class="blog-post-meta">Category: {{ $post->category_id }}</p>
   <p class="blog-post-meta">Created By: {{ $post->user_id }} At: {{ $post->created_at }}</p>
   <blockquote>

   <p>{{ $post->content }}</p>
   </blockquote>
</div><!-- /.blog-post -->
