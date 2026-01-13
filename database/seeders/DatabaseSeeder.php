<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hanya jalankan seeder dari data SQLite export
        $this->call([
            UsersTableSeeder::class,
            NewsCategoriesTableSeeder::class,
            PostsTableSeeder::class,
            CategoryPostTableSeeder::class,
        ]);
    }
}
