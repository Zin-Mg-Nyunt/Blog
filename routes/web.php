<?php

use Illuminate\Support\Facades\Route;

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
    return view('blogs');
});
Route::get('/blog/{blog}', function ($slug) { // laravel မှာ wildcard ကပေးလိုက်တယ့်ကောင်ကို function ထဲမှာ parameter တစ်ခုနဲ့ပြန်ဖမ်းတာကို slug လို့ခေါ်တယ်
    $path=__DIR__."/../resources/blogs/$slug.html";
    if (!file_exists($path)) {
        abort(404);
        return redirect('/');
    }
    $blog=file_get_contents($path);
    return view('blog', [
        "blog"=>$blog
    ]);
})->where("blog", "[A-z\d\-_]+");
//where က wildcard-contraint လို့ခေါ်တယ်။ wildcard နဲ့ ဖမ်းလိုက်တယ့်ကောင်တွေကို သတ်မှတ်ချက်တွေပေးဖို့သုံးတယ်။ where ရဲ့ first parameter မှာတော့ wildcard မှာသုံးထားတယ့် name ကိုပြန်ရေးပေးရတယ်၊ second parameter ကို regular expression လို့ခေါ်တယ်။
//regular expression ဆိုတာ a to z ပဲပါရမယ်၊ number ပဲပါရမယ် စသဖြင့် သတ်မှတ်ချက်ပေးတာဖြစ်တယ်။
//laravel မှာ regular expression ကိုမရေးတတ်ရင် laravel ကလုပ်ပေးထားတဲ့ whereAlpha,whereAlphaNumeric,whereNumber တို့ရှိတယ်
//d ဆိုတာက digit(0-9) ဂဏန်းတွေကို အတိုရေးနည်းဖြစ်တယ်။
