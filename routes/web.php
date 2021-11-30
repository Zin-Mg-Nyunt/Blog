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
Route::get('/blog/{blog}', function ($slug) {
    $path=__DIR__."/../resources/blogs/$slug.html";
    if (!file_exists($path)) {
        abort(404);
        return redirect('/');
    }
    //closure function == callback function (အတူတူပဲ)
    $blog=cache()->remember("posts.$slug", now()->addSeconds(10), function () use ($path) {//closure function ထဲမှာ variable ကိုသိအောင် use(or $GLOBALS["path"]) သုံးပြီးထည့်ရတယ်
        var_dump("time out");
        return file_get_contents($path);
    });
    //user က တစ်ခါဝင်လာတိုင်း file_get_contents နဲ့ file တစ်ခါထုတ်ရတယ်။ user တစ်သောင်းလောက်က ဝင်လာရင် file_get_contents က အခါတစ်သောင်း run ရရင် cpu ကို အရမ်းခိုင်းရတယ်။အဲ့လိုမဖြစ်ရအောင် cache ကိုသုံးရတယ်။
    //cache ကိုသုံးလိုက်တယ့်အခါ user ကပထမတစ်ခါဝင်လာရင် file_get_contents နဲ့ file ကိုထုတ်ပေးပြီး cache ထဲမှာသိမ်းလိုက်တယ်။(cache က server ရဲ့ RAM ထဲမှာသိမ်းတယ်)။နောက်တစ်ခါထပ်ခေါ်ရင် file_get_contents ကို မrun ရတော့ပဲ cache ထဲကနေပဲထုတ်ပေးလိုက်ရုံပဲ။
    //cache ထဲမှာသိမ်းထားတယ့်ဟာကို အချိန်သတ်မှတ်လို့ရတယ်။remember function ရဲ့ second parameter ကအချိန်သတ်မှတ်တဲ့ဟာ။
    //cache ထဲမှာသိမ်းချင်တယ့်ဟာကို remember function ရဲ့ third parameter ဖြစ်တဲ့ closure function(or callback function) ထဲမှာ ရေးရတယ်။
    //remember function ရဲ့ first parameter ထဲမှာ key ကိုထည့်ပေးရတယ်။ အဲ့key နဲ့ cache ထဲကနေပြန်ခေါ်သုံးရတယ်။key ကို unique ဖြစ်အောင် posts.$slug(posts အများကြီးထဲက သက်ဆိုင်ရာ slug)အဲ့လိုပုံစံမျိုးနဲထည့်တာ။
    return view('blog', [
        "blog"=>$blog
    ]);
})->where("blog", "[A-z\d\-_]+");
