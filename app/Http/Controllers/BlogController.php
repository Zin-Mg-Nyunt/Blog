<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs', [
            'blogs'=>Blog::latest()
                        ->filter(request(['search','category','username']))->paginate(6)
                        ->withQueryString()
                        //ဒီကောင်ကကျတော့ query strin (သို့) search key တွေပါလာရင် အဲ့ကောင်တွေကိုပါ တွဲပြီးပြနိုင်အောင်လုပ်တာ
                        // အဲ့ကောင်သာမပါရင် query string (သို့) search key တစ်ခုခုကိုနှိပ်ထားတယ် ပြီးတော့ pagination link ကိုနှိပ်လိုက်ရင် အရင်နှိပ်ထားပြီးဖြစ်တဲ့ search key က ပျောက်သွားတယ်
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
