<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

//BlogController ရဲ့ index ကနေလဲ category ကိုပို့နေရတယ်
//user route ကနေလဲ category ကိုပို့နေရတယ်
//duplicate ဖြစ်နေပြီ နောက်ပြီးတော့ blogs blade တွေကို data ပို့ရင် blog data ပဲပို့သင့်တာပေါ့ အဲ့တာကို category တွေပါပို့နေရတာက သိပ်တော့ကျိုးကြောင်းညီညွတ်မှုမရှိသေးဘူး
//အဲ့တာကြောင့် category data တွေကို ပို့လဲပို့မယ် ကျိုးကြောင်းညီညွတ်စွာမှုလဲရှိအောင် category component တစ်ခုတည်ဆောက်လိုက်တယ်
class BlogController extends Controller
{
    public function index()
    {
        return view('blogs', [
            'blogs'=>Blog::latest()->filter(request(['search','category']))->get()
        ]);
    }
    public function show(Blog $blog)
    {
        return view('blog', [
            "blog"=>$blog,
            "randomBlog"=>Blog::inRandomOrder()->take(3)->get(),
        ]);
    }
}
