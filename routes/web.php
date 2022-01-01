<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('blogs', [
        'blogs'=>Blog::latest()->get(),
        'categories'=>Category::all()
    ]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('blog', [
        "blog"=>$blog,
        "randomBlog"=>Blog::inRandomOrder()->take(3)->get(),
    ]);
})->where("blog", "[A-z\d\-_]+");

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs', [
        'blogs'=>$category->blogs,
        'categories'=>Category::all(),
        'currentCategory'=>$category

    ]);
});

Route::get('/users/{user:username}', function (User $user) {
    return view('blogs', [
        // 'blogs'=>$user->blogs->load('author', 'category')
        //eager load ပုံစံ (obj ထဲက ဆွဲထုတ်တဲ့ ဟာကို eager load ရေးရင် ဒီလိုရေးရတယ်။)
        'blogs'=>$user->blogs,
        'categories'=>Category::all()
    ]);
});
