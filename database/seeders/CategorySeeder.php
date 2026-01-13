<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsCategory;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Politik & Hukum',
            'Olahraga',
            'Ekonomi & Bisnis',
            'Kesehatan',
            'Teknologi & Inovasi',
            'Pendidikan',
            'Hiburan',
            'Budaya & Pariwisata',
            'Nasional',
            'Internasional',
            'Lingkungan & Bencana',
            'Umum'
        ];

        foreach ($categories as $name) {
            NewsCategory::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['title' => $name]
            );
        }
    }
}
