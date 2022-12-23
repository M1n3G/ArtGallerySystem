<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class ArtcommentSeeder extends Seeder
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
                'artID' => '15',
                'username' => 'mingg',
                'rate' => '5',
                'comment_body' => 'This art is great and hard to purchase.',
                'datetime' => '2022-11-30 18:04:30',
                'created_at' => '2022-11-30 18:04:30',
                'updated_at' => '2022-11-30 18:04:30',
            ],
            [
                'id' => '2',
                'artID' => '19',
                'username' => 'minglee',
                'rate' => '2',
                'comment_body' => 'This art is great.',
                'datetime' => '2022-11-30 18:09:25',
                'created_at' => '2022-11-30 18:09:25',
                'updated_at' => '2022-11-30 18:09:25',
            ],
            [
                'id' => '3',
                'artID' => '1',
                'username' => 'yapys',
                'rate' => '3',
                'comment_body' => 'Nice art.',
                'datetime' => '2022-12-01 21:41:13',
                'created_at' => '2022-12-01 21:41:13',
                'updated_at' => '2022-12-01 21:41:13',
            ],
            [
                'id' => '4',
                'artID' => '13',
                'username' => 'mingg',
                'rate' => '2',
                'comment_body' => 'Nice art.',
                'datetime' => '2022-12-01 21:41:13',
                'created_at' => '2022-12-01 21:41:13',
                'updated_at' => '2022-12-01 21:41:13',
            ],
            [
                'id' => '5',
                'artID' => '27',
                'username' => 'minglee',
                'rate' => '3',
                'comment_body' => 'Great art.',
                'datetime' => '2022-12-01 19:33:25',
                'created_at' => '2022-12-01 19:33:25',
                'updated_at' => '2022-12-01 19:33:25',
            ],
            [
                'id' => '6',
                'artID' => '5',
                'username' => 'yapys',
                'rate' => '4',
                'comment_body' => 'Nice',
                'datetime' => '2022-12-03 12:11:27',
                'created_at' => '2022-12-03 12:11:27',
                'updated_at' => '2022-12-03 12:11:27',
            ]

        ];
        Comment::insert($data);
    }
}
