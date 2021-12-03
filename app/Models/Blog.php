<?php
namespace app\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{
    public $title;
    public $slug;
    public $intro;
    public function __construct($title, $slug, $intro)
    {
        $this->title=$title;
        $this->slug=$slug;
        $this->intro=$intro;
    }
    public static function all()
    {
        $files=File::files(resource_path('blogs'));// blogs file တွေက html နဲ့အုပ်ထားတော့ စီမံလို့မရဘူး။ အဲ့တော့ matter package နဲ့စီမံဖို့ blogs file က html နဲ့ရေးထားတာတွေကိုလဲ matter data  တွေအဖြစ်ပြန်ပြောင်းရေး။
        // YamlFrontMatter ကိုလဲ install တင်
        $blogs=[];
        foreach ($files as $file) {
            $obj=YamlFrontMatter::parseFile($file);// YamlFrontMatter ရဲ့ parseFile က obj return ပြန်ပေး။But Document obj ဖြစ်နေတယ်။
            $blog=new Blog($obj->title, $obj->slug, $obj->intro);// အဲ့တော့ကျိုးကြောင်းညီညွတ်အောင် blogs file တွေဆိုတာ blog obj ကပဲလာတယ်ဆိုတာမျိုးဖြစ်အောင် new keyword နဲ့ instentiate လုပ်ပြီး Blog class ထဲကို data တွေသွင်း
            $blogs[]=$blog;// ငါတို့လိုချင်တာက hmtl နဲ့အုပ်ထားတယ် file တွေကို obj ပုံစံပြောင်းချင်တာ စိတ်ကြိုက်စီမံလို့ရအောင်။အဲ့တော့ file အရေအတွက်ပေါ်မူတည်ပြီး obj တွေရအောင် loop ပတ်တဲ့ထဲထည့်တယ်။ ပြီးတော့အဲ့ obj တွေကို $blogs ဆိုတဲ့ array ထဲထည့်သိမ်းထားလိုက်တယ်။
            // (ဒီနေရာမှာ မှတ်ရမှာက Class ကိုဘုံထားပြီး obj တွေကိုလိုသလောက်တည်ဆောက်လို့ရတယ်ဆိုတဲ့အချက်)
        }
        return $blogs;
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
