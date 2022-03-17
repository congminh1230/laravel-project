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
        DB::table('users')-> truncate();
        DB::table('user_infos')-> truncate();
        $users = [
                    [
                     'user'=> 
                         [
                            'name' => 'Admin',
                            'avatar' => 'https://i.9mobi.vn/cf/images/2015/03/nkk/hinh-dep-19.jpg',
                            'email'=> 'Admin@gmail.com',
                            'password' => bcrypt('123456789')
                         ],
                     'info' =>
                         [
                            'address'=> 'Ha Noi',
                            'phone' => '0395515962',
                         ]
               
                    ],

                    [
                        'user'=> 
                            [
                               'name' => 'Admin2',
                               'avatar' => 'https://i.9mobi.vn/cf/images/2015/03/nkk/hinh-dep-19.jpg',
                               'email'=> 'Admin2@gmail.com',
                               'password' => bcrypt('123456789')
                            ],
                        'info' =>
                            [
                               'address'=> 'Ha Noi',
                               'phone' => '0395515962',
                            ]
                  
                       ],

                       [
                        'user'=> 
                            [
                               'name' => 'Admin3',
                               'avatar' => 'https://i.9mobi.vn/cf/images/2015/03/nkk/hinh-dep-19.jpg',
                               'email'=> 'Admin3@gmail.com',
                               'password' => bcrypt('123456789')
                            ],
                        'info' =>
                            [
                               'address'=> 'Thai Binh',
                               'phone' => '0395515962',
                            ]
                  
                       ],

                       [
                        'user'=> 
                            [
                               'name' => 'Admin4',
                               'avatar' => 'https://i.9mobi.vn/cf/images/2015/03/nkk/hinh-dep-19.jpg',
                               'email'=> 'Admin4@gmail.com',
                               'password' => bcrypt('123456789')
                            ],
                        'info' =>
                            [
                               'address'=> 'Son la',
                               'phone' => '0395515962',
                            ]
                  
                       ],

                       [
                        'user'=> 
                            [
                               'name' => 'Admin5',
                               'avatar' => 'https://i.9mobi.vn/cf/images/2015/03/nkk/hinh-dep-19.jpg',
                               'email'=> 'Admin5@gmail.com',
                               'password' => bcrypt('123456789')
                            ],
                        'info' =>
                            [
                               'address'=> 'Ho Chi Minh',
                               'phone' => '0395515962',
                            ]
                  
                       ],

           
        ];

        foreach($users as $user)
        {
            $user_id = DB::table('users')-> insertGetId($user['user']);
            $user['info']['user_id'] = $user_id;
            DB:: table('user_infos')-> insert($user['info']); 
        }


    }
}
