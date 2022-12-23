<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'userID' => 'LzINe4QD',
                'username' => 'MD001',
                'name' => 'Moderator01',
                'email' => 'moderator01@gmail.com',
                'password' => 'artcellsmd01',
                'gender' => 'Male',
                'contactNum' => '012-1235329',
                'userImg' => 'https://res.cloudinary.com/dyfzo7pcs/image/upload/v1670245543/nlynmkqgnllwmcgdec7s.png',
                'userRole' => 'Moderator',
                'datetime' => '2022-12-05 20:08:35',
                'created_at' => '2022-12-05 20:08:35',
                'updated_at' => '2022-12-05 20:08:35',
            ],
        ];

        User::insert($data);
    }
}
