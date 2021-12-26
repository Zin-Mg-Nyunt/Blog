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
        User::truncate();
        Category::truncate();
        Blog::truncate();

        $frontend=Category::factory()->create(['name'=>'frontend post']);
        $backend=Category::factory()->create(['name'=>'backend post']);
        $mgmg=User::factory()->create(['name'=>'mg mg']);
        //User::factory() ဆိုရင် User class ထဲက HasFactory trait ထဲမှာ ရှိတဲ့ factory() method က အလုပ်လုပ်ပြီး သက်ဆိုင်ရာ factory file(eg: UserFactory) ကဆက်အလုပ်လုပ်
        Blog::factory(2)->create(["category_id"=>$frontend->id]);
        Blog::factory(2)->create(["category_id"=>$backend->id]);
        Blog::factory(2)->create(['user_id'=>$mgmg]);
    }
}
