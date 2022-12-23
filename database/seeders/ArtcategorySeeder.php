<?php

namespace Database\Seeders;

use App\Models\Artcategories;
use Illuminate\Database\Seeder;

class ArtcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Drawing',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ],
            [
                'id' => '2',
                'name' => 'Painting',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ],
            [
                'id' => '3',
                'name' => 'Illustration',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ],
            [
                'id' => '4',
                'name' => 'Mixed-media',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ],
            [
                'id' => '5',
                'name' => 'Graphic Art',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ],
            [
                'id' => '6',
                'name' => 'Photography',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ],
            [
                'id' => '7',
                'name' => 'Three-Dimensional Art',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ]

        ];
        Artcategories::insert($data);
    }
}
