<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('post') -> truncate();
        for($i=1; $i<=10; $i++){
            DB::table('post')-> insert([
                'title'=> 'Post'.$i,
                'slug' => 'post-'.$i,
                'content' => 'minh học Laravel',
                'user_created_id' => '1',
                'user_updated_id' => '1',
                'category_id'=>'1'

            ]);
        }
    }
}
