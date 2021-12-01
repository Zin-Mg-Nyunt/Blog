<?php
namespace app\Models;

class Blog
{
    public static function find($slug)
    {
        // $path=__DIR__."/../../resources/blogs/$slug.html";
        $path=resource_path("blogs/$slug.html");// file လမ်းကြောင်းရှာဖို့ laravel ကလုပ်ပေးထားတယ့် path helper function
        if (!file_exists($path)) {
            abort(404);
        }
        return cache()->remember("posts.$slug", now()->addSeconds(10), function () use ($path) {
            return file_get_contents($path);
        });
    }
}
