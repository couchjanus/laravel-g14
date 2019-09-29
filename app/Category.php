<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $perPage = 10;

    protected $fillable = [
        'name', 'description', 'active'
    ];

    protected $dates = ['created_at', 'deleted_at']; 

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
