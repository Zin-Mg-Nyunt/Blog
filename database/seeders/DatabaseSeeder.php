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
        $mgmg=User::factory()->create(['name'=>'mg mg']);// ဒီ line မှာ user factory နဲ့ user table ထဲကို data အရင်သွင်းလိုက်တယ်

        Blog::factory(2)->create(["category_id"=>$frontend->id]);// ဒီမှာ Blog factory နဲ့ blog နှစ်ခုတည်ဆောက်မယ်။ category data မထည့်ဘူး။ user data တော့နှစ်ခါတည်ဆောက်မယ်(user နှစ်ယောက်ထည့်မယ်)
        Blog::factory(2)->create(["category_id"=>$backend->id]);// ဒီမှာ Blog factory နဲ့ blog နှစ်ခုတည်ဆောက်မယ်။ category data မထည့်ဘူး။ user data တော့နှစ်ခါတည်ဆောက်မယ်(user နှစ်ယောက်ထည့်မယ်)
        Blog::factory(2)->create(['user_id'=>$mgmg]);// ဒီမှာ Blog factory နဲ့ blog နှစ်ခုတည်ဆောက်မယ်။ user data မထည့်ဘူး။ category data နှစ်ခါတည်ဆောက်မယ်(category နှစ်ခုထည့်မယ်)
    }
}
