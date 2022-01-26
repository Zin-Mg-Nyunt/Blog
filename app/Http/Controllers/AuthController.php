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
        $formData=request()->validate([
            'name'=>'required|min:3|max:100',
            "username"=>['required','min:3','max:100',Rule::unique('users', 'username')],
            "email"=>['required','email',Rule::unique('users', 'email')],
            "password"=>'required|min:6|max:15'
        ]);
        $user=User::create($formData);
        auth()->login($user);//authentication အတွက် laravel က auth() ဆိုတဲ့ helper function ရှိတယ်။auth ရဲ့ login ဆိုတဲ့ function က register လုပ်ပြီးအောင်မြင်လာတဲ့ user ကို တစ်ခါတည်း login လုပ်ပေးပြီးသားဖြစ်တယ်
        return redirect('/')->with('success', 'Welcome Dear '.$user->name);
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Good Bye');
    }
}
