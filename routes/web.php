<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

Route::get('/', [BlogController::class,'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class,'show']);

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('blogs', [
//         'blogs'=>$category->blogs,
//         'categories'=>Category::all(),
//         'currentCategory'=>$category

//     ]);
// });

Route::get('/users/{user:username}', function (User $user) {
    return view('blogs', [
        'blogs'=>$user->blogs
    ]);
});
//ဒီ route ကနေလဲ category ကိုပို့နေရတယ်
//BlogController ရဲ့ index ကနေလဲ category ကိုပို့နေရတယ်
//duplicate ဖြစ်နေပြီ နောက်ပြီးတော့ blogs blade တွေကို data ပို့ရင် blog data ပဲပို့သင့်တာပေါ့ အဲ့တာကို category တွေပါပို့နေရတာက သိပ်တော့ကျိုးကြောင်းညီညွတ်မှုမရှိသေးဘူး
//အဲ့တာကြောင့် category data တွေကို ပို့လဲပို့မယ် ကျိုးကြောင်းညီညွတ်စွာမှုလဲရှိအောင် category component တစ်ခုတည်ဆောက်လိုက်တယ်
