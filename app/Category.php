<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $perPage = 10;

    protected $fillable = [
        'name', 'description', 'active'
    ];

    protected $dates = ['created_at', 'deleted_at']; // which fields will be Carbon-ized

    // Сортировка по умолчанию:
    protected static function boot() 
    {
        parent::boot();
        // Сортировка по полю name в алфавитном порядке
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('name', 'asc');
        });
    }
}


}
