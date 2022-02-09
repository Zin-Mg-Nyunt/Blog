<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'comment'=>'required'
        ], [
            'comment.required'=>"Your comment shouldn't be blank."
        ]);
        //$blog->comments() ဆိုတာက comment တစ်ခုတည်ဆောက်တာ
        //$blog->comments() ဆိုတာက eloquent relationship အဲ့ကနေ eloquent model ကိုထပ်ဆင့်ခေါ်သုံးပြီးတော့ create() method ကိုသုံးတာ
        $blog->comments()->create([
            'body'=>request('comment'),
            'user_id'=>auth()->id()
        ]);
        return back();
    }
}
