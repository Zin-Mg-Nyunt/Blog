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
    return view('blogs');
});
Route::get('/blog/{blog}', function ($slug) {
    return view('blog', [
        "blog"=>Blog::find($slug) //class ကိုသုံးပြီး refactor လုပ်သွားတာ
        // laravel မှာ class ဆောက်ချင်ရင် app ထဲက Models ထဲမှာဆောက်ရမယ်
        // laravel မှာ class တစ်ခုတည်ဆောက်ရင် namespace ပေးရတယ်
        //Models ဆိုတာကလဲ php class တစ်ခုပဲ(ဒီမှာတော့ fancy work လို့သိထားရင်ရ)
    ]);
})->where("blog", "[A-z\d\-_]+");
