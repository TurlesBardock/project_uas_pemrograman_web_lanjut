<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'content'];

    public static function aboutInfo()
    {
        return [
            'name' => 'Pasha',
            'bio' => 'Head of pustik UBG'
        ];
    }
}
