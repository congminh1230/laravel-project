<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'Shop',
                'url' => '/',
                'status' => 1,
                'sort' => 1
            ],
            [
                'name' => 'Blog',
                'url' => '/blog',
                'status' => 1,
                'sort' => 2
                ],
                [
                'name' => 'Contact',
                'url' => '/',
                'status' => 1,
                'sort' => 3
            ]
                
        ];
        foreach($menus as $menu){
            $menu['created_at'] = now();
            $menu['updated_at'] = now();
            DB::table('menus')->insert($menu);
        }
            
    }
}
