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
        $blog->comments()->create([
            'body'=>request('comment'),
            'user_id'=>auth()->id()
        ]);
        // comment ရေးပြီးရင် redirect ပြန်တာ blog တစ်ခု show-blade file ကိုပြန်အောင်လုပ်တာ
        return redirect('/blogs/'.$blog->slug);
    }
}
