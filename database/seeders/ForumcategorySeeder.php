<?php

namespace Database\Seeders;

use App\Models\Forumcategories;
use Illuminate\Database\Seeder;

class ForumcategorySeeder extends Seeder
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
                'description' => 'Discuss the line, perspective, techniques, graphite, charcoal, or even crayons -- talk about all things drawing here.',
                'status' => 'Visible',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ],
            [
                'id' => '2',
                'name' => 'Graphic Art',
                'description' => 'A place for graphic designers to discuss graphic art.',
                'status' => 'Visible',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ],
            [
                'id' => '3',
                'name' => 'Illustration',
                'description' => 'General discussion on illustration, and art of same.',
                'status' => 'Visible',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ],
            [
                'id' => '4',
                'name' => 'Mixed-media',
                'description' => 'Using multiple media in your work, or alternative materials? Perhaps you are playing with collage, fiber, faux finishes, mosaics, casein, or egg tempera. Have you been finding things off the street and sticking them on your surfaces? Mixed media is the place for you.',
                'status' => 'Visible',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ],
            [
                'id' => '5',
                'name' => 'Painting',
                'description' => 'Discuss the line, perspective, painting techniques, and your favorite brands of colored pencil. Show off your latest masterpieces.',
                'status' => 'Visible',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ],
            [
                'id' => '6',
                'name' => 'Photography',
                'description' => 'Whether you work in traditional photography in the darkroom, use a digital camera, Polaroid, Holga, Brownie, video, Camcorder, Super-8 film, or are taking simple snapshots of the family, this is the place for you to talk about all of your techniques and interests in this field.',
                'status' => 'Visible',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ],
            [
                'id' => '7',
                'name' => 'Three-Dimensional Art',
                'description' => 'Any and all digital work made in any way, shape, or form, in any software program, with a mouse, a stylus, or?',
                'status' => 'Visible',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ]

        ];
        
        Forumcategories::insert($data);
    }
}
