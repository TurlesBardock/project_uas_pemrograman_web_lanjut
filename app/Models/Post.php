<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NewsCategory;

class Post extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'status',
        'published_at',
        'user_id'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // 🔥 Multi-category relation
    public function categories()
    {
        return $this->belongsToMany(
            NewsCategory::class,
            'category_post',
            'post_id',
            'news_category_id'
        );
    }
}
