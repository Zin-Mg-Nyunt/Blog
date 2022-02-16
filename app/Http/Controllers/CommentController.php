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
        
        //comment ရေးလိုက်လို့ subscribe လုပ်ထားတဲ့လူတွေဆီကို mail ပို့မယ်ဆိုရင် အခု login ဝင်ပြီး comment ရေးလိုက်တဲ့လူကလဲ subscribe လုပ်ထားတာပဲ ဒါပေမဲ့ သူရေးလိုက်တဲ့ comment အတွက် သူ့ဆီပါ mail ပြန်ဝင်လာမယ်ဆိုတာ ယုတ်တိမရှိဘူး
        //အဲ့တော့ subscriber တွေကိုစစ်ထုတ်ရမယ်။ $blog->subscriber ဆိုရင် အဲ့blog ကိုsubscribe လုပ်ထားတဲ့ လူတွေကို collection တစ်ခုနဲ့ပြန်ပေးမယ်။ အဲ့တော့ collection ရဲ့ method တစ်ခုဖြစ်တဲ့ fiter နဲ့စစ်။
        //စစ်ထားတဲ့ပုံစံက subscriber လုပ်ထားတဲ့ လူတွေရဲ့ id နဲ့ အခု login ဝင်ပြီး comment ရေးတဲ့လူရဲ့ id မတူတဲ့ subscriber တွေကို collection တစ်ခုအဖြစ်ပြန်ပေး
        $subscribers=$blog->subscriber->filter(fn ($subscriber) => $subscriber->id!=auth()->id());
        
        //laravel ရဲ့ oop sentance နဲ့ရေးတဲ့ပုံစံ
        $subscribers->each(function ($subscriber) use ($blog) {
            Mail::to($subscriber->email)->send(new SubscriberMail($blog));
        });
        
        //foreach နဲ့ရေးတဲ့ပုံစံ
        // foreach ($subscribers as $subscriber) {
        //     Mail::to($subscriber->email)->send(new SubscriberMail($blog));
        // };
        return redirect('/blogs/'.$blog->slug);
    }
}
