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
        return redirect('/')->with('success', 'Welcome Dear '.$user->name);
    }
    public function login()
    {
        return view('auth.login');
    }
    public function post_login()
    {
        //validate ထဲကနောက်ဆုံး parameter က errors တွေကို overwite ပြန်ရေချင်ရင် လုပ်တာ ရေးပုံရေးနည်းက အဲ့လိုရေးရတယ်။ column.rule=>'ရေးချင်တယ့် errors စာတန်း'
        $formData=request()->validate([
            'email'=>['required','email','max:100',Rule::exists('users', 'email')],
            //exists က users table ထဲက email column ထဲမှာ ဝင်လာတဲ့ email data ရှိ/မရှိ စစ်ပေးတာ။
            'password'=>['required','min:6','max:25']
        ], [
            'email.required'=>'Email is required.',
            'email.exists'=>'Your email is invalid.',
            'password.min'=>'Password should be more than 5 characters.'
        ]);
        dd($formData);
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Good Bye');
    }
}
