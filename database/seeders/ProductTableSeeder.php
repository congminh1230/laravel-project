<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $products=['đèn led','Mâng dio','Thắng rambo','Thắng rambo 7','lốp','Thắng rambo 2','Thắng rambo 4','Thắng rambo 5','Thắng rambo 22','Thắng rambo44'];
        DB::table('products')->truncate();
        foreach($products as $product)
        {
            DB::table('products')-> insert([
                'name'=> $product,
                'slug'=>Str::slug($product),
                'category_id'=>1,
                'description'=> 'chất lượng cao',
                'quantity'=> 10,
                'price_origin'=> 380,
                'price_sale'=> 180,
                'discount_percent'=> 10,
                'user_id'=>1,
                'shop_id'=> 1,
                'status'=>'1'
            ]);
        }
    }
}
