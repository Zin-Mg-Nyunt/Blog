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

//File Naming Conventions
//လုပ်ဆောင်ချက် -> controller method -> view file နာမည်(feature.method)
//all -> index -> blogs.index
//single -> show -> blogs.show
//create form -> create -> blogs.create
//server store -> store -> -
//edit form -> edit -> blogs.edit
//server update -> update -> -
//server delete -> destroy -> -

//Students Project
//all -> index -> students.index
//single -> show -> students.show
//create form -> create -> students.create
//server store -> store -> -
//edit form -> edit -> students.edit
//server update -> update -> -
//server delete -> destroy -> -
