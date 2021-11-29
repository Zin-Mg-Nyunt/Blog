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
Route::get('/blog/{blog}', function ($fileName) { //{} (wildcard)အတွန့်ကွင်းထဲက blog က url ထဲမှာ ပါလာတယ့်ဟာကို dynamic ကျကျလက်ခံပေးမယ့်ကောင်။ ပြီးတော့ laravel က အဲ့ကောင်ကို function ထဲကို parameter တစ်ခုအနေနဲ့ထည့်ပေးလိုက်တယ်။
    $path=__DIR__."/../resources/blogs/$fileName.html"; // ဒါက file လမ်းကြောင်း
    $blog=file_get_contents($path); // file_get_contents() က file တွေကိုလှမ်းဆွဲတယ့် function။ အထဲမှာ (file လမ်းကြောင်း/file name) ကို string အနေနဲ့ထည့်ပေးရတယ်။
    return view('blog', [
        "blog"=>$blog
    ]);
    // laravel ကနောက်ကွယ်မှာ second parameter array ထဲက key နေရာမှာရှိနေတဲ့ blog ကို variable တစ်ခုအဖြစ်ပြန်ပြောင်းပေးပြီး template မှာပြန်ထည့်ပေးထားတယ်၊
});
