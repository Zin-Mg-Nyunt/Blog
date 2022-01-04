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
    $blogs=Blog::latest(); //query ကို if ထဲမှာ ထည့်စစ်ချင်လို့ ($blogs)variable နဲ့ query ကိုဆွဲထုတ်ထားတယ်။
    if (request('search')) { // request() က user ထည့်ပေးလိုက်တဲ့ data ကိုပြန်ဖမ်း
        $blogs=$blogs->where('title', 'LIKE', '%'.request('search').'%');
        //where ဆိုတာ condition query.first parameter က blogs table ထဲက column name, second parameter ဖြစ်တဲ့ (LIKE) က user က title အပြည့်အစုံကို မသိလို့ သိတဲ့ စာတစ်လုံးကိုပဲရိုက်ထည့်လိုက်တဲ့အခါ အဲ့စာတစ်လုံးပါတဲ့ blogs တွေကို ချပြအောင်လုပ်ပေးတာ။အဲ့ (LIKE) ဆိုတဲ့ query သာမပါရင် title အပြည့်အစုံကို ထည့်ပေးမှ blogs ပြပြီး title အပြည့်အစုံမထည့်ပေးရင် ဘာblogs မှမပြပေးနိုင်တော့ဘူး။ third parameter က search bar မှာ user ထည့်ပေးလိုက်တဲ့ data ကို ပြန်ထည့်ထားတာ။ (%) တွေက user ထည့်ပေးလိုက်တဲ့ data ရဲ့ အရှေ့မှာရော အနောက်မှာရော စာတွေရှိနိုင်သေးတယ်လို့ ယူဆပြီး စာတွေကိုယ်စား ထည့်ပေးရတာ။ (LIKE) ကိုသုံးရင် (%) လဲသုံးရတယ်
    }
    return view('blogs', [
        'blogs'=>$blogs->get(),
        'categories'=>Category::all()
    ]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('blog', [
        "blog"=>$blog,
        "randomBlog"=>Blog::inRandomOrder()->take(3)->get(),
    ]);
})->where("blog", "[A-z\d\-_]+");

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs', [
        'blogs'=>$category->blogs,
        'categories'=>Category::all(),
        'currentCategory'=>$category

    ]);
});

Route::get('/users/{user:username}', function (User $user) {
    return view('blogs', [
        // 'blogs'=>$user->blogs->load('author', 'category')
        //eager load ပုံစံ (obj ထဲက ဆွဲထုတ်တဲ့ ဟာကို eager load ရေးရင် ဒီလိုရေးရတယ်။)
        'blogs'=>$user->blogs,
        'categories'=>Category::all()
    ]);
});
