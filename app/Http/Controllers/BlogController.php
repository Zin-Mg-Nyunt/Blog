<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected function getBlogs()
    {
        return Blog::latest()->filter()->get();
        //filter() ဆိုတဲ့ method က eloquent model(Blog) ရဲ့ method မဟုတ်ဘူး။အဲ့တော့ custom method တစ်ခုအနေနဲ့ရေးရတယ်။အဲ့လိုရေးဖို့ scopequery ရေးနည်းနဲ့ရေးရတယ်

        // $query=Blog::latest();//ဒါက blogs ကိုဆွဲထုတ်တယ်ဆိုတာထက် query တစ်ခုကိုပြင်ဆင်တာပဲရှိသေးတယ်။ ဒါကြောင့် $query လို့ variable ကိုသတ်မှတ်မယ်

        // // ဒါက ရိုးရိုး if else ပုံစံနဲ့ရေးထားတာ
        // // if (request('search')) {
        // //     $blogs=$blogs->where('title', 'LIKE', '%'.request('search').'%')
        // //                 ->orWhere('body', 'LIKE', '%'.request('search').'%');
        // // }

        // // ဒါက OOP ပုံစံနဲ့ရေးတာ
        // $query->when(request('search'), function ($query, $search) {
        //     $query->where('title', 'LIKE', '%'.$search.'%')
        //         ->orWhere('body', 'LIKE', '%'.$search.'%');
        // });
        // // if နဲ့စစ်မဲ့အစား when ဆိုတဲ့ laravel ကလုပ်ပေးတဲ့ Eloquent Model Method နဲ့စစ်မယ်။ when မှာ parameter နှစ်ခု လက်ခံမယ်။ First parameter က true/အမှန်တရား/positive ဘက်ကိုသွားတယ်ဆိုရင် Second parameter ဖြစ်တဲ့ callback function ကအလုပ်လုပ်မယ်။ callback function ထဲမှာ parameter နှစ်ခုလက်ခံမယ်။ First Parameter က လက်ရှိ run နေတဲ့ query[Blog::latest()] ဆိုတဲ့ဟာကိုလက်ခံမယ်။ Second Parameter  က when ရဲ့ first parameter ဖြစ်တဲ့ (search value) ကိုလက်ခံမယ်။

        // return $query->get();
    }
    public function index()
    {
        return view('blogs', [
            //ဒီ Blog::latest()->filter()->get() ဆိုတဲ့ query လေးကတိုလို့ method တစ်ခုခွဲရေးနေစရာမလိုတော့ဘူး
            //filter method ကနေ data ထည့်ပေးလို့ရတယ်။စစ်မယ့် condition ကိုလဲထည့်ပေးလို့ရတယ်
            //request() ထဲက search က string ပုံစံဖြစ်နေလို့ array ပုံစံပြောင်းမယ်။ search ကို array[] လေးထောင့်ကွင်းလေး အုပ်လိုက်ရုံပဲ
            //array ပုံစံနဲ့ရေးထားတော့ ကြိုက်တာနဲ့ စစ်လို့ရသွားပြီ။ author နဲ့ပဲစစ်စစ်၊ category နဲ့ပဲစစ်စစ်
                'blogs'=>Blog::latest()->filter(request(['search']))->get(),
                'categories'=>Category::all()
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
