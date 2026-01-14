<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('news_categories')->delete();
        
        \DB::table('news_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Politik & Hukum',
                'slug' => 'politik-hukum',
                'created_at' => '2026-01-13 09:46:23',
                'updated_at' => '2026-01-13 09:46:23',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Olahraga',
                'slug' => 'olahraga',
                'created_at' => '2026-01-13 09:46:23',
                'updated_at' => '2026-01-13 09:46:23',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Ekonomi & Bisnis',
                'slug' => 'ekonomi-bisnis',
                'created_at' => '2026-01-13 09:46:23',
                'updated_at' => '2026-01-13 09:46:23',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Kesehatan',
                'slug' => 'kesehatan',
                'created_at' => '2026-01-13 09:46:23',
                'updated_at' => '2026-01-13 09:46:23',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Teknologi & Inovasi',
                'slug' => 'teknologi-inovasi',
                'created_at' => '2026-01-13 09:46:23',
                'updated_at' => '2026-01-13 09:46:23',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Pendidikan',
                'slug' => 'pendidikan',
                'created_at' => '2026-01-13 09:46:23',
                'updated_at' => '2026-01-13 09:46:23',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Hiburan',
                'slug' => 'hiburan',
                'created_at' => '2026-01-13 09:46:23',
                'updated_at' => '2026-01-13 09:46:23',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Budaya & Pariwisata',
                'slug' => 'budaya-pariwisata',
                'created_at' => '2026-01-13 09:46:23',
                'updated_at' => '2026-01-13 09:46:23',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Nasional',
                'slug' => 'nasional',
                'created_at' => '2026-01-13 09:46:23',
                'updated_at' => '2026-01-13 09:46:23',
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Internasional',
                'slug' => 'internasional',
                'created_at' => '2026-01-13 09:46:23',
                'updated_at' => '2026-01-13 09:46:23',
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Lingkungan & Bencana',
                'slug' => 'lingkungan-bencana',
                'created_at' => '2026-01-13 09:46:23',
                'updated_at' => '2026-01-13 09:46:23',
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Umum',
                'slug' => 'umum',
                'created_at' => '2026-01-13 09:46:23',
                'updated_at' => '2026-01-13 09:46:23',
            ),
        ));
        
        
    }
}