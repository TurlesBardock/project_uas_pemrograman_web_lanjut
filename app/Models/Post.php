<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NewsCategory;

class Post extends Model
{

    protected $casts = [
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'status',
        'published_at',
        'category_id',
        'user_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function category()
    {
        return $this->belongsTo(\App\Models\NewsCategory::class, 'category_id');
    }

    public static function aboutInfo()
    {
        return [
            'name' => 'Pasha',
            'bio' => 'Head of pustik UBG'
        ];
    }
}
