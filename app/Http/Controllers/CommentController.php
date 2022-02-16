<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $subscribers=$blog->subscriber->filter(fn ($subscriber) => $subscriber->id!=auth()->id());
        
        $subscribers->each(function ($subscriber) use ($blog) {
            //send အစား queue ကိုသုံးပေးတာ asynchronous ပုံစံအလုပ်လုပ်အောင်(တစ်လိုင်းမပြီးသေးလဲ နောက်တစ်လိုင်းကအလုပ်ဆက်လုပ်တယ်။ ပထမလိုင်းကမပြီးသေးတဲ့အလုပ်က သူ့ဟာသူ နောက်တစ်နေရာမှာ တစ်ခြား worker နဲ့အလုပ်က ဆက်လုပ်နေမယ်။ ဒီဘက်ကနေလဲ user ကိုဆက်ပြစရာရှိတာ ဆက်ပြမယ်)
            //send ကကျတော့ synchronous ပုံစံအလုပ်လုပ်တယ်(တစ်လိုင်းပြီးမှတစ်လိုင်း)
            Mail::to($subscriber->email)->queue(new SubscriberMail($blog));
        });
        
        return redirect('/blogs/'.$blog->slug);
    }
}
