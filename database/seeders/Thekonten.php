<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class Thekonten extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => 'UBG',
            'content' => 'komputernya bagus banget'
        ]);
        Post::create([
            'title' => 'Unram',
            'content' => 'teknik sipilnya pro2'
        ]);
        Post::create([
            'title' => 'UIN',
            'content' => 'agamis banget orangnya'
        ]);
    }
}
