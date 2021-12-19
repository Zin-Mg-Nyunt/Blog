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
Route::get('/blogs/{blog}', function (Blog $blog) { // Route_Model_Binding နည်းလမ်း function(Blog $blog) ဆိုတာက ["blog"=>Blog::findOrFail($slug)] ဆိုတဲ့ ရေးတဲ့ပုံစံကို တစ်ခါတည်းရေးလို့ရအောင် laravel ကလုပ်ပေးထားတာ
    return view('blog', [
        "blog"=>$blog
    ]);
})->where("blog", "[A-z\d\-_]+");
