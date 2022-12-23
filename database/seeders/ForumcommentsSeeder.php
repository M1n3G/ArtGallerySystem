<?php

namespace Database\Seeders;

use App\Models\Forumcomment;
use Illuminate\Database\Seeder;

class ForumcommentsSeeder extends Seeder
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
                'postID' => '63',
                'category_id' => '1',
                'username' => 'minglee',
                'comment_body' => 'Great work Queen! It looks like stone for sure',
                'datetime' => '2022-12-05 13:36:10',
                'created_at' => '2022-12-05 13:36:10',
                'updated_at' => '2022-12-05 13:36:10',
            ],
            [
                'id' => '2',
                'postID' => '59',
                'category_id' => '1',
                'username' => 'yapys',
                'comment_body' => 'Great work man',
                'datetime' => '2022-12-05 13:40:40',
                'created_at' => '2022-12-05 13:40:40',
                'updated_at' => '2022-12-05 13:40:40',
            ],
            [
                'id' => '3',
                'postID' => '60',
                'category_id' => '1',
                'username' => 'yapys',
                'comment_body' => 'You can watch tutorial videos from YouTube or blog',
                'datetime' => '2022-12-05 13:41:21',
                'created_at' => '2022-12-05 13:41:21',
                'updated_at' => '2022-12-05 13:41:21',
            ],
            [
                'id' => '4',
                'postID' => '64',
                'category_id' => '4',
                'username' => 'yapys',
                'comment_body' => 'This is a gorgeous painting! The movement of the leaves are beautiful!',
                'datetime' => '2022-12-05 13:42:04',
                'created_at' => '2022-12-05 13:42:04',
                'updated_at' => '2022-12-05 13:42:04',
            ],
            [
                'id' => '5',
                'postID' => '65',
                'category_id' => '4',
                'username' => 'yapys',
                'comment_body' => 'I love these little gems! These are so great! :)',
                'datetime' => '2022-12-05 13:43:25',
                'created_at' => '2022-12-05 13:43:25',
                'updated_at' => '2022-12-05 13:43:25',
            ],
            [
                'id' => '6',
                'postID' => '66',
                'category_id' => '4',
                'username' => 'yapys',
                'comment_body' => 'This is really cool !',
                'datetime' => '2022-12-05 13:44:16',
                'created_at' => '2022-12-05 13:44:16',
                'updated_at' => '2022-12-05 13:44:16',
            ],
            [
                'id' => '7',
                'postID' => '67',
                'category_id' => '4',
                'username' => 'yapys',
                'comment_body' => 'This is really nice, good control of the watercolor paint. I am too detail oriented to make beautiful watercolors like this.',
                'datetime' => '2022-12-05 13:44:56',
                'created_at' => '2022-12-05 13:44:56',
                'updated_at' => '2022-12-05 13:44:56',
            ],
            [
                'id' => '8',
                'postID' => '68',
                'category_id' => '4',
                'username' => 'yapys',
                'comment_body' => 'VERY COOL',
                'datetime' => '2022-12-05 13:46:05',
                'created_at' => '2022-12-05 13:46:05',
                'updated_at' => '2022-12-05 13:46:05',
            ],
            [
                'id' => '9',
                'postID' => '76',
                'category_id' => '6',
                'username' => 'yapys',
                'comment_body' => 'Acrylic on board.',
                'datetime' => '2022-12-05 13:52:19',
                'created_at' => '2022-12-05 13:52:19',
                'updated_at' => '2022-12-05 13:52:19',
            ],
            [
                'id' => '10',
                'postID' => '14',
                'category_id' => '2',
                'username' => 'mingg',
                'comment_body' => 'Paolo Uccello is a great artist',
                'datetime' => '2022-12-05 14:04:38',
                'created_at' => '2022-12-05 14:04:38',
                'updated_at' => '2022-12-05 14:04:38',
            ],
            [
                'id' => '11',
                'postID' => '81',
                'category_id' => '7',
                'username' => 'mingg',
                'comment_body' => 'Fake news',
                'datetime' => '2022-12-05 14:31:18',
                'created_at' => '2022-12-05 14:31:18',
                'updated_at' => '2022-12-05 14:31:18',
            ],
            [
                'id' => '12',
                'postID' => '61',
                'category_id' => '1',
                'username' => 'mingg',
                'comment_body' => 'This kitten so cute',
                'datetime' => '2022-12-05 18:23:41',
                'created_at' => '2022-12-05 18:23:41',
                'updated_at' => '2022-12-05 18:23:41',
            ],
            [
                'id' => '13',
                'postID' => '83',
                'category_id' => '3',
                'username' => 'derii',
                'comment_body' => 'It was great',
                'datetime' => '2022-12-05 20:57:26',
                'created_at' => '2022-12-05 20:57:26',
                'updated_at' => '2022-12-05 20:57:26',
            ],  [
                'id' => '14',
                'postID' => '62',
                'category_id' => '1',
                'username' => 'mingg',
                'comment_body' => 'It was great',
                'datetime' => '2022-12-21 23:42:33',
                'created_at' => '2022-12-21 23:42:33',
                'updated_at' => '2022-12-21 23:42:33',
            ]
          
        ];
        
        Forumcomment::insert($data);
    }
}
