<!-- views/blog.blade.php -->
<h1><?=$title?></h1>

<?php foreach ($posts as $post):?>
 <div class="blog-post">
   <h2 class="blog-post-title"><a href="/blog/<?=$post->id;?>"><?=$post->title;?></a></h2>               
   <p class="blog-post-meta"><?=$post->created_at;?></p>
   <blockquote>
      <p><?=$post->content;?></p>
   </blockquote>
 </div><!-- /.blog-post -->
<?php endforeach;?>
