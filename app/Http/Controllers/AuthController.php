<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        //laravel ရဲ့ requestမှာပါတဲ့ validate က input ကထည့်ပေးလိုက်တဲ့ဟာတွေက သတ်မှတ်ထားတဲ့ rule တွေနဲ့ညီတယ်ဆိုမှ သူ့အောက်မှာရှိတဲ့ code တွေကို ထပ်အလုပ်လုပ်ပေးမှာ rule တွေနဲ့မညီဘူးဆိုရင် အရှေ့က create form ကိုပြန်ပို့ပေးတယ်
        //request() ရဲ့ validate ကိုသုံးပြီးတော့ အထဲမှာ rule တွေသတ်မှတ်လို့ရတယ်
        request()->validate([
            'name'=>'required|min:3|max:100',//ဒီလိုမျိုးလဲ rule ကိုရေးလို့ရတယ်
            "username"=>'required|min:3|max:100',//max ဆိုတာ အများဆုံး အလုံး၁၀၀ ထိထည့်လို့ရတယ်ဆိုတဲ့ အဓိပါယ်
            "email"=>['required','email'],//ဒီလို array ပုံစံနဲ့လဲ rule ကိုရေးလို့ရတယ်
            "password"=>'required|min:6|max:15'//min ဆိုတာ အနည်းဆုံး ၆လုံးထည့်ပေးရမယ်ဆိုတဲ့ အဓိပါယ်
        ]);
    }
}
