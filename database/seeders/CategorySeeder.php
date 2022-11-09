<?php

namespace Database\Seeders;

use App\Models\Forumcategories;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $data = [
        [
            'name'=> 'Mixed Media',
            'description'=> 'Forum about mixed media',
            'keyword'=> 'mixedmedia',
            'created_at'=> now(),
        ],
        [
            'name'=> 'Illustration',
            'description'=> 'Forum about Illustration',
            'keyword'=> 'illustration',
            'created_at'=> now(),
        ],
        [
            'name'=> 'Abstract',
            'description'=> 'Forum about abstract art',
            'keyword'=> 'abstractart',
            'created_at'=> now(),
        ]

        ];
        Forumcategories::insert($data);
    }
}
