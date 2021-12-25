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
        //truncate() က databas ထဲက အရင် data တွေကို ဖျက်တာ
        //truncate ခံလိုက်တော့ php artisan migrate:fresh --seed ကို run လိုက်တဲ့အခါတိုင်း unique error က ထပ်မတက်တော့ဘူး
        User::truncate();
        Category::truncate();
        Blog::truncate();

        User::factory()->create();
        //factory() က user တွေကို generate စီပြီး table ထဲထည့်ပေးတာ။ factory() ထဲမှာ ဘာမှ မရေးထားရင် default အနေနဲ့ 1 ကို laravel ကသတ်မှတ်ပေးထားတယ်။

        $frontend=Category::create([
            'name'=>'frontend post',
            'slug'=>'frontend'
        ]);
        $backend=Category::create([
            'name'=>'backend post',
            'slug'=>'backend'
        ]);

        Blog::create([
            'title'=>'Frontend Post',
            'slug'=>'frontend-post',
            'category_id'=>$frontend->id,
            'intro'=>'this is intro',
            'body'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet libero assumenda harum, sint autem laborum, facilis dolorem, voluptatum nam odio sed? Architecto illum molestiae incidunt iusto repudiandae tempora odit, excepturi quam porro consequatur quis, pariatur nulla fugiat illo dignissimos dolore aut laborum deleniti est totam repellendus suscipit recusandae libero. Sapiente eum beatae nobis pariatur praesentium? Architecto nostrum dolores iusto quo hic nemo suscipit similique maiores pariatur consequuntur. Deserunt dolorum nulla reiciendis repudiandae! Tempore soluta asperiores voluptatem reiciendis incidunt fugit libero ipsum dignissimos, excepturi aliquid, cupiditate, eum delectus tenetur quae necessitatibus inventore facilis expedita atque explicabo. Inventore dolorum nesciunt harum dolore.'
        ]);
        Blog::create([
            'title'=>'Backend Post',
            'slug'=>'backend-post',
            'category_id'=>$backend->id,
            'intro'=>'this is intro',
            'body'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet libero assumenda harum, sint autem laborum, facilis dolorem, voluptatum nam odio sed? Architecto illum molestiae incidunt iusto repudiandae tempora odit, excepturi quam porro consequatur quis, pariatur nulla fugiat illo dignissimos dolore aut laborum deleniti est totam repellendus suscipit recusandae libero. Sapiente eum beatae nobis pariatur praesentium? Architecto nostrum dolores iusto quo hic nemo suscipit similique maiores pariatur consequuntur. Deserunt dolorum nulla reiciendis repudiandae! Tempore soluta asperiores voluptatem reiciendis incidunt fugit libero ipsum dignissimos, excepturi aliquid, cupiditate, eum delectus tenetur quae necessitatibus inventore facilis expedita atque explicabo. Inventore dolorum nesciunt harum dolore.'
        ]);
    }
}
