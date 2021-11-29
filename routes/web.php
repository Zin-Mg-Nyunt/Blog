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
Route::get('/blog/{blog}', function ($fileName) {
    $path=__DIR__."/../resources/blogs/$fileName.html"; // ဒါက (file လမ်းကြောင်း/file name)
    //အကယ်၍ user က မရှိတယ့် routes တစ်ခု/file လမ်းကြောင်းတစ်ခုကို ပေးခဲ့ရင် error မတက်အောင် file လမ်းကြောင်းကို ဆွဲထုတ်တဲ့အဆင့်မရောက်ခင်မှာ if နဲ့စစ်ထားသင့်တယ်။
    if (!file_exists($path)) { // file_exists က အဲ့ (file လမ်းကြောင်း/file name) ရှိ/မရှိစစ်တာ
        abort(404); // abort က 404 page ကိုပြဖို့သုံးတာ။ပြီးရင် အောက်က code တွေလဲအလုပ်ဆက်မလုပ်တော့ဘူး။
        //or
        return redirect('/'); //return မပြန်ရင် အောက်က code တွေက အလုပ်ဆက်လုပ်မှာဖြစ်ပြီး file လမ်းကြောင်းမရှိတဲ့ $path ကြောင့်error တွေတက်လာလိမ့်မယ်
    }
    $blog=file_get_contents($path);
    return view('blog', [
        "blog"=>$blog
    ]);
    // laravel ကနောက်ကွယ်မှာ second parameter array ထဲက key နေရာမှာရှိနေတဲ့ blog ကို variable တစ်ခုအဖြစ်ပြန်ပြောင်းပေးပြီး template မှာပြန်ထည့်ပေးထားတယ်၊
});
