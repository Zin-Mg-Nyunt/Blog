<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs'=>Blog::latest()
                        ->filter(request(['search','category','username']))->paginate(6)
                        ->withQueryString()
                        //ဒီကောင်ကကျတော့ query strin (သို့) search key တွေပါလာရင် အဲ့ကောင်တွေကိုပါ တွဲပြီးပြနိုင်အောင်လုပ်တာ
                        // အဲ့ကောင်သာမပါရင် query string (သို့) search key တစ်ခုခုကိုနှိပ်ထားတယ် ပြီးတော့ pagination link ကိုနှိပ်လိုက်ရင် အရင်နှိပ်ထားပြီးဖြစ်တဲ့ search key က ပျောက်သွားတယ်
        ]);
    }
    public function show(Blog $blog)
    {
        return view('blogs.show', [
            "blog"=>$blog,
            "randomBlog"=>Blog::inRandomOrder()->take(3)->get(),
        ]);
    }
    public function subscriptionHandler(Blog $blog)
    {
        //if auth user subscribed to this blog
        //auth()->user()->isSubscribed($blog) ဒီလိုရေးတာက user model ထဲက isSubscribed() method ကိုခေါ်သုံးတာ ဒါပေမဲ့ laravel ကဘယ်လိုထင်လဲဆိုတော့ blog model ကနေပြီးတော့ isSubscribed() method ကိုသုံးတယ်လို့ထင်ပြီး မရှိတဲ့ method ကိုခေါ်တယ်ဆိုပြီး error ပြတာ
        if (User::find(auth()->user()->id)->isSubscribed($blog)) {
            $blog->unSubscribe();
        } else {
            $blog->subscribe();
        }
        return back();
    }
}
