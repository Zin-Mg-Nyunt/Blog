<?php
namespace app\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{
    public $title;
    public $slug;
    public $intro;
    public $body;
    public $date;
    public function __construct($title, $slug, $intro, $body, $date)
    {
        $this->title=$title;
        $this->slug=$slug;
        $this->intro=$intro;
        $this->body=$body;
        $this->date=$date;
    }
    public static function all()
    {
        return collect(File::files(resource_path('blogs')))
                        ->map(function ($file) {
                            $obj=YamlFrontMatter::parseFile($file);
                            return new Blog($obj->title, $obj->slug, $obj->intro, $obj->body(), $obj->date);
                        })
                        ->sortByDesc('date');
    }
    public static function find($slug)
    {
        $blogs=static::all();
        return $blogs->firstWhere('slug', $slug);
    }
    public static function findOrFail($slug)
    {
        $blog=static::find($slug);
        if (!$blog) {
            throw new ModelNotFoundException();// blog ကမရှိတဲ့ဟာဆိုရင် ModelNotFoundException ဆိုတဲ့ဟာကို throw လုပ်ပေးတယ်။အဲ့ကောင်က နောက်ကွယ်မှာ abort(404) ဆိုတာကို လုပ်ပေးနေတာ။ပိုပြီးတော့ ကျိုးကြောင်းညီညွတ်မှုရှိအောင်သုံးရတာ
        }
        return $blog;
    }
}
