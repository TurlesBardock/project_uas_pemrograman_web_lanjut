<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NewsCategory;

class Post extends Model
{
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


    public function category()
    {
        return $this->belongsTo(NewsCategory::class);
    }

    public static function aboutInfo()
    {
        return [
            'name' => 'Pasha',
            'bio' => 'Head of pustik UBG'
        ];
    }
}
