<?php
namespace app\Models;

use Illuminate\Support\Facades\File; // File class ကိုသုံးဖို့ (File Facades ကိုအရင်သွင်းရတယ်)

class Blog
{
    public static function all()
    {
        // dd(resource_path('blogs'));
        $files=File::files(resource_path('blogs'));// ဖိုင်တွေအများကြီးကို ဆွဲထုတ်ဖို့ files() method နဲ့ထုတ်။ အဲ့တာက directory(ဖိုင်ပတ်လမ်းကြောင်း) ကိုတောင်းတယ်။ ဆွဲထုတ်ချင်တဲ့ ဖိုင်တွေ(blogs)က resources ဆိုတဲ့ folder ထဲမှာရှိနေတော့ resource_path() နဲ့ဆွဲထုတ်။ resource_path function(laravel path helper function)က ဖိုင်ပတ်လမ်းကြောင်းကိုပဲ return ပြန်ပေးတာ။
        // File က value နေရာမှာ object ဖြစ်တဲ့ array တစ်ခုကို return ပြန်တယ်။

        // dd($files[0]->getContents());// $files က array။အဲ့တော့ $files[0]ဆိုတော့ 0 index ကိုထုတ်ပေးတယ်။0 index ရဲ့ value က object ဖြစ်နေတော့ getContents() method ကို -> အဲ့တာလေးနဲ့ခေါ်လို့ရတယ်။getContents() က အဲ့object ထဲမှာရှိတဲ့စာတွေကိုထုတ်ပေးတာ။

        //$files(File) က value နေရာမှာ object ဖြစ်တဲ့ array။ ငါတို့လိုချင်တာက array တစ်ခုကိုပဲလိုချင်တာ။
        //အဲ့တော့ ရှိနေတဲ့ $files ဆိုတဲ့ array ကိုမူတည်ပြီး array တစ်ခုထပ်ဖန်တီးဖို့ array_may ကိုသုံး
        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }
    public static function find($slug)
    {
        $path=resource_path("blogs/$slug.html");
        if (!file_exists($path)) {
            abort(404);
        }
        return cache()->remember("posts.$slug", now()->addSeconds(10), function () use ($path) {
            return file_get_contents($path);
        });
    }
}
