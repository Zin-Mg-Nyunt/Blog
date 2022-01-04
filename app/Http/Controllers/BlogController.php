<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected function getBlogs()//query ကို method တစ်ခုအနေနဲ့ ခွဲထုတ်ရေးလိုက်
    {
        $blogs=Blog::latest();
        if (request('search')) {
            $blogs=$blogs->where('title', 'LIKE', '%'.request('search').'%')
                        ->orWhere('body', 'LIKE', '%'.request('search').'%');
        }
        return $blogs->get();//return ပြန်တဲ့အခါ get()နဲ့ပါ blog ကိုဆွဲထုတ်ပြီးတော့မှ return ပြန်
    }
    public function index()
    {
        return view('blogs', [
                'blogs'=>$this->getBlogs(),//query ထုတ်ရေးထားတဲ့ method name ကိုခေါ်ပြီးပြန်သုံး
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
