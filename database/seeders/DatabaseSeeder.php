<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $mgmg=User::factory()->create(['name'=>'mg mg','username'=>'mg mg']);
        $aungaung=User::factory()->create(['name'=>'aung aung','username'=>'aung aung']);
        $frontend=Category::factory()->create(['name'=>'frontend post','slug'=>'frontend']);
        $backend=Category::factory()->create(['name'=>'backend post','slug'=>'backend']);
        
        Blog::factory(2)->create(["category_id"=>$frontend->id,"user_id"=>$mgmg]);
        Blog::factory(2)->create(["category_id"=>$backend->id,"user_id"=>$aungaung]);
    }
}
