<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $users = [
            [
                'name' => 'lol',
                'avatar' => 'lol',
                'address'=> 'hanoi',
                'email' => 'congminh@gamil.com',
                'phone' => '0814332325',
                'password' => bcrypt('lol')
            ],
            [
                'name' => 'nhat',
                'avatar' => 'nhat',
                'address'=> 'hanoi',
                'email' => 'nhat@gamil.com',
                'phone' => '0847894758',
                'password' => bcrypt('minh')
            ],
            [
                'name' => 'khanh',
                'avatar' => 'khanh',
                'address'=> 'hanoi',
                'email' => 'khanh@gamil.com',
                'phone' => '0945894297',
                'password' => bcrypt('khanh')
            ],
            [
                'name' => 'ngoc',
                'avatar' => 'ngoc',
                'address'=> 'hanoi',
                'email' => 'ngoc@gamil.com',
                'phone' => '0986787426',
                'password' => bcrypt('ngoc')
            ],
            [
                'name' => 'hop',
                'avatar' => 'hop',
                'address'=> 'hanoi',
                'email' => 'hop@gamil.com',
                'phone' => '0984567326',
                'password' => bcrypt('hop')
            ]
            ];
            foreach($users as $user) {
                DB::table('users')->insert($user);
            }


    }
}
