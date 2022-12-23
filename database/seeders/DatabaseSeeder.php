<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ArtcategorySeeder::class);
        $this->call(ArtSeeder::class);
        $this->call(ArtcommentSeeder::class);
        $this->call(ForumcategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ForumcommentsSeeder::class);
    }
}
