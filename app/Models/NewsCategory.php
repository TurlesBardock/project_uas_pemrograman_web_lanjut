<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $fillable = [
        'title',
        'slug',
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }

    public function posts()
    {
        return $this->belongsToMany(
            Post::class,
            'category_post',
            'news_category_id',
            'post_id'
        );
    }
}
