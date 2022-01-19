<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

Route::get('/', [BlogController::class,'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class,'show']);

Route::get('/register', [AuthController::class,'create']);
//get method နဲ့လာရင် အပေါ်က route ကအလုပ်လုပ်မယ်။ user ကို view file ပြန်ပြမယ်
Route::post('/register', [AuthController::class,'store']);
//post method နဲ့ လာရင် အပေါ်က route ကအလုပ်လုပ်မယ်။ user ကို ဘာview file မှပြန်မပြဘူး။ server မှာပဲ data ကို store လုပ်မယ်။
//post method တွေကို server ကို data ပို့ဖို့လုပ်တဲ့အခါမှာသုံး
