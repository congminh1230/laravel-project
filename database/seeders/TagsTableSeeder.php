<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = [
            'Toyota', 'Chevrolet', 'Ford', 'Honda','Hyundai','Kia','Lexus','Mazda','Peugeot','Porsche','Mercedes Benz','BMW','Mini Cooper','Audi',' Lamborghini','Volvo','Jaguar','Maserati','Bentley','Vinfast'
        ];
        DB::table('tags')->truncate();
        foreach($tags as $tag){
         DB::table('tags')->insert([
             'name' => $tag,
             'slug' => str::slug($tag),
             'created_at' => now(),
             'updated_at' => now()
         ]);
        }
    }
}
