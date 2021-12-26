<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // DB::listen(function ($query) {
    //     // Log::info("message"); //အဲ့တာကို ရေးရလွယ်အောင် logger ပုံစံနဲ့ ရေး

    //     logger($query->sql); //logger ထဲမှာ message ကိုရေးရ၊ run သွားတဲ့ query တွေကို sql ပုံစံနဲ့ ပြပါလို့ ရေးထားတာ။(/ routes) ကို refreach လုပ်လိုက်ရင် storage ထဲက logs ထဲက laravel.log ဖိုင်ထဲမှာ sql ပုံစံနဲ့ ပေါ်တယ်။
    // });

    //အဲ့လို log file ထဲမှာ ပေါ်စေချင်တိုင်း အဲ့လိုကြီးရေးနေရတာကို မလုပ်ချင်လို့ clockwork ဆိုတဲ့ tool ကို project folder ထဲမှာ install တင်(php clockwork ဆိုပြီး chrome မှာရှာ)။အဲ့လိုဆိုရင် larvel.log ဖိုင်ထဲမှာသွားကြည့်စရာမလိုတော့ဘူး။ chrome မှာ inspect ထောက်ပြီးကြည့်လိုက်ရုံပဲ

    return view('blogs', [
        // 'blogs'=>Blog::with('category', 'author')->get()
        // lazy loading// eager load
        //query run တာကို လျော့ချဖို loop ပတ်ဖို့ data ပေးလိုက်တည်းက category(Eloquent Relationship) ကိုပါထုတ်ပြီးထည့်ပေး။ with() နဲ့ category(Eloquent Relationship) ကိုထုတ်ပေးရင် allကိုသုံးလို့မရတော့၊ get()ကိုပဲသုံးရတယ်။ all() က (Blog::al()) အဲ့လိုပုံစံတစ်မျိုးတည်းပဲသုံးရတယ်။
        //blog တွေအားလုံးကိုဆွဲထုတ်တဲ့ဟာကို eager load ရေးရင် ဒီလိုရေးရတယ်

        'blogs'=>Blog::latest()->get()
        //latest() ကိုသုံးလိုက်ရင် laravel ကနောက်ကွယ်မှာ order by sql နဲ့ create_at ကိုကြည့်ပြီးအလုပ်လုပ်တယ်(Desc နည်းလမ်းအရ ပြောင်းပြန် ချပြတယ်)နောက်ဆုံးတင်တဲ့ blog ကအပေါ်ဆုံးမှာ ရှိတယ်။
        //ကြားမှာ query တစ်ခုကို ထည့်ရေးပေးလိုက်ရင် all() ကိုသုံးလို့မရတော့ဘူး။ get() ကိုပဲသုံးလို့ရတော့တယ်။
    ]);
});
Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('blog', [
        "blog"=>$blog
    ]);
})->where("blog", "[A-z\d\-_]+");
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs', [
        // 'blogs'=>$category->blogs->load('author', 'category')
        //eager load ပုံစံ (obj ထဲက ဆွဲထုတ်တဲ့ ဟာကို eager load ရေးရင် ဒီလိုရေးရတယ်။)

        'blogs'=>$category->blogs
    ]);
});
Route::get('/users/{user:username}', function (User $user) {
    return view('blogs', [
        // 'blogs'=>$user->blogs->load('author', 'category')
        //eager load ပုံစံ (obj ထဲက ဆွဲထုတ်တဲ့ ဟာကို eager load ရေးရင် ဒီလိုရေးရတယ်။)

        'blogs'=>$user->blogs
    ]);
});
