<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Fillable fields for a course
     *
     * @return array
     */
    protected $fillable = ['body','post_id','user_id'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
    protected $casts = [
        'user_id' => 'bigInteger',
        'post_id' => 'bigInteger',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
