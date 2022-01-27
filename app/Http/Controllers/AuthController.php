<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        $formData=request()->validate([
            'name'=>'required|min:3|max:100',
            "username"=>['required','min:3','max:100',Rule::unique('users', 'username')],
            "email"=>['required','email',Rule::unique('users', 'email')],
            "password"=>'required|min:6|max:25'
        ], [
            'email.unique'=>'Your email is already exists.'
        ]);
        $user=User::create($formData);
        auth()->login($user);
        return redirect('/')->with('success', 'Thank You for Registration');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function post_login()
    {
        $formData=request()->validate([
            'email'=>['required','email','max:100',Rule::exists('users', 'email')],
            'password'=>['required','min:6','max:25']
        ], [
            'email.required'=>'Email is required.',
            'email.exists'=>'Your email is invalid.',
            'password.min'=>'Password should be more than 5 characters.'
        ]);
        //credentials လုပ်တာ (ဝင်လာတဲ့ email ကို user table ထဲက email column မှာရှိလား/မရှိလား သွားရှာတယ်။ ရှိရင် အဲ့ email နဲ့အတူဝင်လာတဲ့ password နဲ့ user table ထဲက password ရဲ့ hash version နဲ့ တူလား/မတူလား စစ်တယ်။ သူက boolean တန်ဖိုး return ပြန်တယ်။ စစ်လို့မှန်ရင် true/ မှားရင် false)
        //အဲ့တာတွေအကုန်လုံးကို attempt()က လုပ်ပေးတာ။ သူက array တစ်ခုကိုလက်ခံတယ်။ $formData ကလဲ validate လုပ်ပြီးအောင်မြင်ရင် ပြန်ရလာတဲ့ array
        if (auth()->attempt($formData)) {
            return redirect('/')->with('success', 'Welcome back '.auth()->user()->name);
        } else {
            return redirect('/')->back()->withErrors([
                'password'=>'Password does not match.'
            ]);
            //error message ကိုပို့ချင်ရင် withErrors() ဆိုတာနဲ့ပို့ရတယ်
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Good Bye');
    }
}
