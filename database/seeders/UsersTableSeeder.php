<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@bumigoranews.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$NurFO3uV/1Kfwk2GsgWQ.ug0bx.0jhmC31RLifMvixmQ708UxzTJK',
                'remember_token' => NULL,
                'created_at' => '2026-01-13 09:46:23',
                'updated_at' => '2026-01-13 09:46:23',
            ),
        ));
        
        
    }
}