<?php
namespace app\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{
    public $title;
    public $slug;
    public $intro;
    public $body;
    public function __construct($title, $slug, $intro, $body)
    {
        $this->title=$title;
        $this->slug=$slug;
        $this->intro=$intro;
        $this->body=$body;
    }
    public static function all()
    {
        //php ကပါတဲ့ array_map ကိုသုံးပြီးလုပ်သွားတဲ့ပုံစံ
        // return array_map(function ($file) {
        //     $obj=YamlFrontMatter::parseFile($file);
        //     return new Blog($obj->title, $obj->slug, $obj->intro);
        // }, File::files(resource_path('blogs')));//File class နဲ့လုပ်လို့ရတဲ့ obj value ဖြစ်တဲ့ array ကို မူတည်ပြီး array တစ်ခုထပ်ထုတ်ချင်တော့ array_map ကိုသုံးတယ်။array_map ကလဲ array တစ်ခုကို return ပြန်ပေးတယ်၊ ထည့်လိုက်တဲ့ array ကို auto loop ပတ်ပေးတယ်။loop ပတ်လာပြီးရလာတဲ့ data တွေကို စိတ်ကြိုက်စီမံလို့ရအောင် YamlFrontMatter နဲ့ obj ပြန်လုပ်တယ် but document obj တွေဖြစ်နေလို့ blog obj ဖြစ်အောင် new keyword နဲ့ Blog ထဲကို data ပြန်သွင်းပြီး return ပြန်တယ်။

        //laravel မှာပါတဲ့ collection concept ကိုသုံးတဲ့ပုံစံ
        return collect(File::files(resource_path('blogs')))//array တစ်ခုကို collect ထဲ့ထည့်တယ် ပြီးတော့ map လုပ်တယ်
                        ->map(function ($file) {// map က collect ထဲ့ထည့်ထားတဲ့ array ကို loop ပတ်လို့ရတယ့် data တစ်ခုချင်းစီတန်ဖိုးကို လက်ခံတယ် (array_map ရဲ့ callback function နဲ့ပုံစံတူတယ်။)
                            $obj=YamlFrontMatter::parseFile($file);
                            return new Blog($obj->title, $obj->slug, $obj->intro, $obj->body());
                        });
        
        //collection ကိုသုံးရတဲ့ အားသာချက်တွေက array တွေကို ပေါင်းလို့ရတယ်၊ map လုပ်လို့ရတယ်၊ filter လုပ်လို့ရတယ်၊ array ရဲ့ပထမဆုံး iteam(or)နောက်ဆုံး iteam ဆွဲထုတ်တာ စတာတွေကို OOP ပုံစံနဲ့ လုပ်လို့ရတယ်။
    }
    public static function find($slug)
    {
        //collection ကိုသုံးပြီး OOP ပုံစံနဲ့ သက်ဆိုင်ရာiteam(blog) ကိုဆွဲထုတ်နည်း
        $blogs=static::all();//static method ကို နောက်ထပ် method ထဲမှာပြန်ထည့်သုံးတဲ့နည်း။
        // dd(gettype($blogs));
        // $blogs ကobject ဘာobject လဲဆိုတော့ array ကိုမှ collection အုပ်ထားတဲ့ obj။
        return $blogs->firstWhere('slug', $slug);
        // firstWhere က (blog ထဲမှာရှိတဲ့ slug) နဲ့ (route ရဲ့ wildcard ကဝင်လာတဲ့ $slug) နဲ့တူတဲ့ ပထမဆုံးblog ကို ရွေးပြ

        // $path=resource_path("blogs/$slug.html");
        // if (!file_exists($path)) {
        //     abort(404);
        // }
        // return cache()->remember("posts.$slug", now()->addSeconds(10), function () use ($path) {
        //     return file_get_contents($path);
        // });
    }
}
