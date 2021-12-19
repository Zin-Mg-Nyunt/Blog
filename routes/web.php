<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;

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
        'blogs'=>Blog::all()
    ]);
});
Route::get('/blogs/{blog:slug}', function (Blog $blog) { // Route_Model_Binding  နည်းလမ်း function(Blog $blog) ဆိုတာက ["blog"=>Blog::findOrFail($id)] ဆိုတဲ့         ရေးတဲ့ပုံစံကို တစ်ခါတည်းရေးလို့ရအောင် laravel ကလုပ်ပေးထားတာ
    // default အရဆိုရင် findOfFail() ဆိုတဲ့ method က ဝင်လာတဲ့ data ကို id column နဲ့တိုက်စစ်ပြီးရှာတယ်။ အဲ့တာကို slug column နဲ့ custom တိုက်စစ်ပြီးရှာချင်ရင် wildcard ထဲမှာ :slug ဆိုပြီး colum name ကိုထည့်ရေးပေးရတယ်။
    return view('blog', [
        "blog"=>$blog
    ]);
})->where("blog", "[A-z\d\-_]+");
