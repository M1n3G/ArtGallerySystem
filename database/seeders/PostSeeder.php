<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
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
                'id' => '1',
                'title' => 'The Two Fridas',
                'body' => '<p>The double self-portrait of the Mexican artist <strong>Frida Kahlo</strong> is one of her most notable paintings and her first large-scale work.&nbsp;</p><blockquote><p>The Two Fridas depicts two different versions of Frida sitting side-by-side.&nbsp;</p></blockquote><p>Frida claimed the theme of the painting to be more politically engaged as she used her image as a metaphor to explore the varying lines of emotions. Painted in <i>1939</i> at the time of her divorce from <strong>Diego Rivera</strong>, the painting is also believed to be an expression of feelings.<br>&nbsp;</p>',
                'image' => 'https://res.cloudinary.com/dyfzo7pcs/image/upload/v1670217195/hcw4tg26huwcaicsw7ll.jpg',
                'category_id' => '1',
                'status' => 'Visible',
                'created_by' => 'joshua',
                'datetime' => '2022-11-17 15:25:19',
                'created_at' => '2022-11-17 15:25:19',
                'updated_at' => '2022-11-17 15:25:19',
            ],
            [
                'id' => '2',
                'title' => 'The Ninth Wave',
                'body' => '<p>Number 86 on the list of the most famous paintings of all time is <strong>The Ninth Wave</strong> by <i><strong>Ivan Aivazovsky</strong></i>.&nbsp;</p><ul><li>This painting is the perfect example of a storm both in terms of the weather depiction and emotions.&nbsp;</li><li>It is believed that the ninth shaft is the strongest of the waves, and nothing can withstand its power.&nbsp;</li><li>The Ninth Wave gained popularity for its creative use of warm tones while depicting the sea that’s hit by a storm. The warm colors tones down the apparent menace and gives a light of hope for survival.</li></ul>',
                'image' => 'https://res.cloudinary.com/dyfzo7pcs/image/upload/v1670217490/g6chhsqpcjxdsil2wpda.jpg',
                'category_id' => '2',
                'status' => 'Visible',
                'created_by' => 'minglee',
                'datetime' => '2022-11-18 15:25:19',
                'created_at' => '2022-11-18 15:25:19',
                'updated_at' => '2022-11-18 15:25:19',
            ],
            [
                'id' => '3',
                'title' => 'St. George And The Dragon',
                'body' => '<p>The famous painting St. George and The Dragon by Paolo Uccello is a clear visual depiction of a gothicizing tendency of the artist. It represents a scene from a popular story of St. George and the dragon.</p><blockquote><p>St. George can be seen spearing the plague-bearing dragon while the princess holds the dragon’s leash. The sky shows the emergence of the storm, which suggests that divine intervention helped him to victory.</p></blockquote>',
                'image' => 'https://res.cloudinary.com/dyfzo7pcs/image/upload/v1670217588/ppruazqumwshv6vdbcio.jpg',
                'category_id' => '3',
                'status' => 'Visible',
                'created_by' => 'joshh',
                'datetime' => '2022-11-01 15:25:19',
                'created_at' => '2022-11-01 15:25:19',
                'updated_at' => '2022-11-01 15:25:19',
            ],
            [
                'id' => '4',
                'title' => 'Drawing with charcoal',
                'body' => '<p>Doing an online class and the current series of classes are on drawing with charcoal.. i do like the strong contrast getting really dark darks. Mostly with this first charcoal lesson I learned that charcoal will never be my “go to“ medium,</p>',
                'image' => 'https://res.cloudinary.com/dyfzo7pcs/image/upload/v1670217952/l4dgso1vhikgjgturyre.jpg',
                'category_id' => '4',
                'status' => 'Visible',
                'created_by' => 'mingg',
                'datetime' => '2022-11-02 15:25:19',
                'created_at' => '2022-11-02 15:25:19',
                'updated_at' => '2022-11-02 15:25:19',
            ],
            [
                'id' => '5',
                'title' => 'This is a blind cross contour drawing',
                'body' => 'This is a blind cross contour drawing, done decades ago in a life drawing class with a male model.',
                'image' => 'https://res.cloudinary.com/dyfzo7pcs/image/upload/v1670218054/hwg9co1eaedorcvoa88t.jpg',
                'category_id' => '5',
                'status' => 'Visible',
                'created_by' => 'minglee',
                'datetime' => '2022-11-02 13:25:19',
                'created_at' => '2022-11-02 13:25:19',
                'updated_at' => '2022-11-02 13:25:19',
            ],
            [
                'id' => '6',
                'title' => 'Realistic portrait drawing - Dry brush - Game of Thrones, how is it ?',
                'body' => '<p>After all the years of being a hardcore fan of GOT, I thought let me try my luck with GOT. Last year in the month of October,2017 I decided to paint all the characters of Game of Thrones. It started as a fun thing and it turned out to be a project beyond the limits of my physical capacity. I wanted to paint all the characters, video record the process of painting and share the spirit of GOT with all our GOT family members. Of course, I wanted to become famous too. I am an artist and every creative person craves for attention, I am no different. I wanted to couple my talent along with the sentiment of GOT and gain recognition among our GOT family. Trust me it started as a painting project, a practice exercise for me and by the end of 40th work I realized a tremendous difference in my work when compared to my works before the project. This exercise boosted my level of confidence immensely and I do not know how but since then I have never had complaints from my customers. I mean to say all the commissioned single and family portraits came out really well after the project. During the exercise of GOT, I learnt how to capture the features of my characters (without losing the shape of the character) along with the mood that they were in and the expressions that they were known for.<br><br>After the <a href="https://ramyasadasivam.com/realistic-face-drawing/"><strong>realistic face drawing </strong></a>project, I was able to see a significant increase in my followers count on the social networking sites. I received a few requests on classes. Since after the project I was confident about face drawing, I wanted to create video tutorial on whatever I have learnt from the 50-character-portrait exercise. It took me about 4 months, January till April, 2018 to create the video tutorial.<br><br><strong>This is my tribute to the die-hard fans of GOT worldwide. I am displaying few of my works for your perusal.</strong></p>',
                'image' => 'https://res.cloudinary.com/dyfzo7pcs/image/upload/v1670218177/wlmf9uv7lt69kq7bcc2l.jpg',
                'category_id' => '6',
                'status' => 'Visible',
                'created_by' => 'ching',
                'datetime' => '2022-12-05 13:25:19',
                'created_at' => '2022-12-05 13:25:19',
                'updated_at' => '2022-12-05 13:25:19',
            ],
            [
                'id' => '7',
                'title' => 'Crosshatching figure silhouette',
                'body' => '<p>I have wanted to explore what I can do with silhouettes more. How should I start</p>',
                'category_id' => '7',
                'status' => 'Visible',
                'created_by' => 'ching',
                'datetime' => '2022-12-06 05:30:55',
                'created_at' => '2022-12-06 05:30:55',
                'updated_at' => '2022-12-06 05:30:55',
            ]

        ];
        
        Post::insert($data);
    }
}
