<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryPostTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category_post')->delete();
        
        \DB::table('category_post')->insert(array (
            0 => 
            array (
                'id' => 7,
                'post_id' => 4,
                'news_category_id' => 1,
            ),
            1 => 
            array (
                'id' => 8,
                'post_id' => 4,
                'news_category_id' => 9,
            ),
            2 => 
            array (
                'id' => 9,
                'post_id' => 5,
                'news_category_id' => 1,
            ),
            3 => 
            array (
                'id' => 10,
                'post_id' => 5,
                'news_category_id' => 9,
            ),
            4 => 
            array (
                'id' => 11,
                'post_id' => 6,
                'news_category_id' => 1,
            ),
            5 => 
            array (
                'id' => 12,
                'post_id' => 6,
                'news_category_id' => 9,
            ),
            6 => 
            array (
                'id' => 13,
                'post_id' => 7,
                'news_category_id' => 1,
            ),
            7 => 
            array (
                'id' => 14,
                'post_id' => 7,
                'news_category_id' => 9,
            ),
            8 => 
            array (
                'id' => 15,
                'post_id' => 8,
                'news_category_id' => 1,
            ),
            9 => 
            array (
                'id' => 16,
                'post_id' => 8,
                'news_category_id' => 10,
            ),
            10 => 
            array (
                'id' => 17,
                'post_id' => 9,
                'news_category_id' => 1,
            ),
            11 => 
            array (
                'id' => 18,
                'post_id' => 9,
                'news_category_id' => 10,
            ),
            12 => 
            array (
                'id' => 19,
                'post_id' => 10,
                'news_category_id' => 1,
            ),
            13 => 
            array (
                'id' => 20,
                'post_id' => 10,
                'news_category_id' => 9,
            ),
            14 => 
            array (
                'id' => 21,
                'post_id' => 11,
                'news_category_id' => 2,
            ),
            15 => 
            array (
                'id' => 22,
                'post_id' => 11,
                'news_category_id' => 9,
            ),
            16 => 
            array (
                'id' => 23,
                'post_id' => 12,
                'news_category_id' => 2,
            ),
            17 => 
            array (
                'id' => 24,
                'post_id' => 12,
                'news_category_id' => 9,
            ),
            18 => 
            array (
                'id' => 25,
                'post_id' => 13,
                'news_category_id' => 2,
            ),
            19 => 
            array (
                'id' => 26,
                'post_id' => 13,
                'news_category_id' => 9,
            ),
            20 => 
            array (
                'id' => 27,
                'post_id' => 14,
                'news_category_id' => 2,
            ),
            21 => 
            array (
                'id' => 28,
                'post_id' => 14,
                'news_category_id' => 10,
            ),
            22 => 
            array (
                'id' => 29,
                'post_id' => 15,
                'news_category_id' => 2,
            ),
            23 => 
            array (
                'id' => 30,
                'post_id' => 15,
                'news_category_id' => 9,
            ),
            24 => 
            array (
                'id' => 31,
                'post_id' => 16,
                'news_category_id' => 2,
            ),
            25 => 
            array (
                'id' => 32,
                'post_id' => 16,
                'news_category_id' => 9,
            ),
            26 => 
            array (
                'id' => 33,
                'post_id' => 17,
                'news_category_id' => 3,
            ),
            27 => 
            array (
                'id' => 34,
                'post_id' => 17,
                'news_category_id' => 9,
            ),
            28 => 
            array (
                'id' => 35,
                'post_id' => 18,
                'news_category_id' => 3,
            ),
            29 => 
            array (
                'id' => 36,
                'post_id' => 18,
                'news_category_id' => 9,
            ),
            30 => 
            array (
                'id' => 37,
                'post_id' => 19,
                'news_category_id' => 3,
            ),
            31 => 
            array (
                'id' => 38,
                'post_id' => 19,
                'news_category_id' => 9,
            ),
            32 => 
            array (
                'id' => 39,
                'post_id' => 20,
                'news_category_id' => 3,
            ),
            33 => 
            array (
                'id' => 40,
                'post_id' => 20,
                'news_category_id' => 9,
            ),
            34 => 
            array (
                'id' => 41,
                'post_id' => 21,
                'news_category_id' => 10,
            ),
            35 => 
            array (
                'id' => 42,
                'post_id' => 21,
                'news_category_id' => 11,
            ),
            36 => 
            array (
                'id' => 43,
                'post_id' => 22,
                'news_category_id' => 9,
            ),
            37 => 
            array (
                'id' => 44,
                'post_id' => 22,
                'news_category_id' => 11,
            ),
            38 => 
            array (
                'id' => 45,
                'post_id' => 23,
                'news_category_id' => 9,
            ),
            39 => 
            array (
                'id' => 46,
                'post_id' => 23,
                'news_category_id' => 11,
            ),
            40 => 
            array (
                'id' => 47,
                'post_id' => 24,
                'news_category_id' => 9,
            ),
            41 => 
            array (
                'id' => 48,
                'post_id' => 24,
                'news_category_id' => 11,
            ),
            42 => 
            array (
                'id' => 49,
                'post_id' => 25,
                'news_category_id' => 10,
            ),
            43 => 
            array (
                'id' => 50,
                'post_id' => 25,
                'news_category_id' => 11,
            ),
            44 => 
            array (
                'id' => 51,
                'post_id' => 26,
                'news_category_id' => 9,
            ),
            45 => 
            array (
                'id' => 52,
                'post_id' => 26,
                'news_category_id' => 11,
            ),
            46 => 
            array (
                'id' => 53,
                'post_id' => 27,
                'news_category_id' => 7,
            ),
            47 => 
            array (
                'id' => 54,
                'post_id' => 27,
                'news_category_id' => 9,
            ),
            48 => 
            array (
                'id' => 55,
                'post_id' => 28,
                'news_category_id' => 7,
            ),
            49 => 
            array (
                'id' => 56,
                'post_id' => 28,
                'news_category_id' => 10,
            ),
            50 => 
            array (
                'id' => 57,
                'post_id' => 29,
                'news_category_id' => 7,
            ),
            51 => 
            array (
                'id' => 58,
                'post_id' => 29,
                'news_category_id' => 10,
            ),
            52 => 
            array (
                'id' => 59,
                'post_id' => 30,
                'news_category_id' => 7,
            ),
            53 => 
            array (
                'id' => 60,
                'post_id' => 30,
                'news_category_id' => 10,
            ),
            54 => 
            array (
                'id' => 63,
                'post_id' => 32,
                'news_category_id' => 7,
            ),
            55 => 
            array (
                'id' => 64,
                'post_id' => 32,
                'news_category_id' => 10,
            ),
            56 => 
            array (
                'id' => 67,
                'post_id' => 34,
                'news_category_id' => 4,
            ),
            57 => 
            array (
                'id' => 68,
                'post_id' => 34,
                'news_category_id' => 9,
            ),
            58 => 
            array (
                'id' => 71,
                'post_id' => 36,
                'news_category_id' => 4,
            ),
            59 => 
            array (
                'id' => 72,
                'post_id' => 36,
                'news_category_id' => 9,
            ),
            60 => 
            array (
                'id' => 73,
                'post_id' => 37,
                'news_category_id' => 4,
            ),
            61 => 
            array (
                'id' => 74,
                'post_id' => 37,
                'news_category_id' => 9,
            ),
            62 => 
            array (
                'id' => 75,
                'post_id' => 38,
                'news_category_id' => 4,
            ),
            63 => 
            array (
                'id' => 76,
                'post_id' => 38,
                'news_category_id' => 9,
            ),
            64 => 
            array (
                'id' => 77,
                'post_id' => 39,
                'news_category_id' => 4,
            ),
            65 => 
            array (
                'id' => 78,
                'post_id' => 39,
                'news_category_id' => 10,
            ),
            66 => 
            array (
                'id' => 79,
                'post_id' => 40,
                'news_category_id' => 4,
            ),
            67 => 
            array (
                'id' => 80,
                'post_id' => 40,
                'news_category_id' => 9,
            ),
            68 => 
            array (
                'id' => 81,
                'post_id' => 41,
                'news_category_id' => 8,
            ),
            69 => 
            array (
                'id' => 82,
                'post_id' => 41,
                'news_category_id' => 9,
            ),
            70 => 
            array (
                'id' => 83,
                'post_id' => 42,
                'news_category_id' => 8,
            ),
            71 => 
            array (
                'id' => 84,
                'post_id' => 42,
                'news_category_id' => 9,
            ),
            72 => 
            array (
                'id' => 85,
                'post_id' => 43,
                'news_category_id' => 8,
            ),
            73 => 
            array (
                'id' => 86,
                'post_id' => 43,
                'news_category_id' => 10,
            ),
            74 => 
            array (
                'id' => 87,
                'post_id' => 44,
                'news_category_id' => 8,
            ),
            75 => 
            array (
                'id' => 88,
                'post_id' => 44,
                'news_category_id' => 9,
            ),
            76 => 
            array (
                'id' => 89,
                'post_id' => 45,
                'news_category_id' => 8,
            ),
            77 => 
            array (
                'id' => 90,
                'post_id' => 45,
                'news_category_id' => 9,
            ),
            78 => 
            array (
                'id' => 91,
                'post_id' => 46,
                'news_category_id' => 6,
            ),
            79 => 
            array (
                'id' => 92,
                'post_id' => 46,
                'news_category_id' => 9,
            ),
            80 => 
            array (
                'id' => 93,
                'post_id' => 47,
                'news_category_id' => 6,
            ),
            81 => 
            array (
                'id' => 94,
                'post_id' => 47,
                'news_category_id' => 9,
            ),
            82 => 
            array (
                'id' => 95,
                'post_id' => 48,
                'news_category_id' => 6,
            ),
            83 => 
            array (
                'id' => 96,
                'post_id' => 48,
                'news_category_id' => 9,
            ),
            84 => 
            array (
                'id' => 97,
                'post_id' => 49,
                'news_category_id' => 6,
            ),
            85 => 
            array (
                'id' => 98,
                'post_id' => 49,
                'news_category_id' => 9,
            ),
            86 => 
            array (
                'id' => 99,
                'post_id' => 50,
                'news_category_id' => 6,
            ),
            87 => 
            array (
                'id' => 100,
                'post_id' => 50,
                'news_category_id' => 9,
            ),
            88 => 
            array (
                'id' => 101,
                'post_id' => 51,
                'news_category_id' => 6,
            ),
            89 => 
            array (
                'id' => 102,
                'post_id' => 51,
                'news_category_id' => 10,
            ),
            90 => 
            array (
                'id' => 103,
                'post_id' => 52,
                'news_category_id' => 5,
            ),
            91 => 
            array (
                'id' => 104,
                'post_id' => 52,
                'news_category_id' => 10,
            ),
            92 => 
            array (
                'id' => 105,
                'post_id' => 53,
                'news_category_id' => 5,
            ),
            93 => 
            array (
                'id' => 106,
                'post_id' => 53,
                'news_category_id' => 9,
            ),
            94 => 
            array (
                'id' => 107,
                'post_id' => 54,
                'news_category_id' => 5,
            ),
            95 => 
            array (
                'id' => 108,
                'post_id' => 54,
                'news_category_id' => 9,
            ),
            96 => 
            array (
                'id' => 109,
                'post_id' => 55,
                'news_category_id' => 5,
            ),
            97 => 
            array (
                'id' => 110,
                'post_id' => 55,
                'news_category_id' => 10,
            ),
            98 => 
            array (
                'id' => 111,
                'post_id' => 56,
                'news_category_id' => 5,
            ),
            99 => 
            array (
                'id' => 112,
                'post_id' => 56,
                'news_category_id' => 10,
            ),
        ));
        
        
    }
}