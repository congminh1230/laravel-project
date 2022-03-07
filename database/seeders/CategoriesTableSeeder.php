<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['Điện thoại','Máy tính','Phần cứng','Phần mềm'];
        DB::table('categories')->truncate();
        foreach($categories as $category)
        {
            DB::table('categories')-> insert([
                'name'=> $category
            ]);
        }
    }
}
