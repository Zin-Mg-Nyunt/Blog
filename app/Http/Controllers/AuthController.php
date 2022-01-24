<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        //validate က ထည့်လာတယ့် input က data တွေကသူသတ်မှတ်ထားတဲ့ rule တွေနဲ့ကိုက်ညီလို့ အောင်မြင်တယ်ဆိုရင် arrray တစ်ခု return ပြန်ပေးတယ်
        $formData=request()->validate([
            'name'=>'required|min:3|max:100',
            "username"=>['required','min:3','max:100',Rule::unique('users', 'username')],
            //unique rule ကိုထည့်ချင်ရင် ဒီလိုပုံစံနဲ့ထည့်ရတယ် | (pipe) နဲ့ထည့်လို့မရဘူး array ပုံစံနဲ့ပဲထည့်လို့ရတယ်
            "email"=>['required','email',Rule::unique('users', 'email')],
            "password"=>'required|min:6|max:15'
        ]);
        User::create($formData);

        return redirect('/');
    }
}
