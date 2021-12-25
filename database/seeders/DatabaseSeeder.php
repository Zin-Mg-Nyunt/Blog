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

        //Category class ထဲက factory method ကိုသုံးတာ။Category class ထဲမှာ (factory method မရှိပေမဲ့လဲ) use HasFactory ဆိုပြီး use လုပ်ထားတော့ HasFactory ဆိုတဲ့ trait ထဲမှာ factory method ရှိတယ်။ factory method က CategoryFactory file ထဲက definition method ကို run စေတယ်။
        $frontend=Category::factory()->create(['name'=>'frontend post']);
        $backend=Category::factory()->create(['name'=>'backend post']);

        User::factory()->create();
        Blog::factory(2)->create(["category_id"=>$frontend->id]);
        Blog::factory(2)->create(["category_id"=>$backend->id]);
    }
}
