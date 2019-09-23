<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\TitleScope;
use Illuminate\Database\Eloquent\Builder;

use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'content', 'status', 'category_id', 'user_id', 'published'
    ];
    /**
    * Scope a query to only include posts of a given type.
    *
    * @param  \Illuminate\Database\Eloquent\Builder $query
    * @param  mixed $type
    * @return \Illuminate\Database\Eloquent\Builder
    */
    
    static function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::addGlobalScope(new TitleScope);
    // }

    // protected static function boot()   {
    //     parent::boot();
    //     static::addGlobalScope('title', function (Builder $builder) {
    //         $builder->orderBy('title', 'asc');
    //     });
    // }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
}
