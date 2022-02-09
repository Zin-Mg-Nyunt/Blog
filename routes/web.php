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

//register route ကို guestဖြစ်နေတယ့်အချိန်၊ login မဝင်ရသေးတဲ့အချိန် မှသာ ဝင်လို့ရမယ်
Route::get('/register', [AuthController::class,'create'])->middleware('guest');
Route::post('/register', [AuthController::class,'store'])->middleware('guest');

//logout route ကို authဖြစ်နေတယ့်အချိန်၊ login ဝင်ပြီးတဲ့အချိန် မှသာ ဝင်လို့ရမယ်
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth');

//login route ကို guestဖြစ်နေတယ့်အချိန်၊ login မဝင်ရသေးတဲ့အချိန် မှသာ ဝင်လို့ရမယ်
Route::get('/login', [AuthController::class,'login'])->middleware('guest');
Route::post('/login', [AuthController::class,'post_login'])->middleware('guest');
