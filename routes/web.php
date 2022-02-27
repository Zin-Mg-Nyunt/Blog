<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

Route::get('/', [BlogController::class,'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class,'show']);

Route::post('/blogs/{blog:slug}/comment', [CommentController::class,'store']);

Route::get('/register', [AuthController::class,'create'])->middleware('guest');
Route::post('/register', [AuthController::class,'store'])->middleware('guest');

Route::post('/logout', [AuthController::class,'logout'])->middleware('auth');

Route::get('/login', [AuthController::class,'login'])->middleware('guest');
Route::post('/login', [AuthController::class,'post_login'])->middleware('guest');

Route::post('/blogs/{blog:slug}/subscription', [BlogController::class,'subscriptionHandler']);

// get request နဲ့ဝင်လာတယ့်အခါ BlogController ထဲမရောက်သေးခင် middleware() နဲ့ admin ဟုတ်မဟုတ်အရင်စစ်ပြီးတော့မှ admin ဟုတ်တယ်ဆိုရင် BlogController ထဲက create method ဆီဆက်သွား
Route::get('/admin/blogs/create', [BlogController::class,'create'])->middleware('admin');
