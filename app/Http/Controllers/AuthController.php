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
        // session()->flash('success', 'Welcom Dear '.$user->name);
        //flash ဆိုတာက ခဏတစ်ဖြုတ်ပဲပေါ်စေချင်တဲ့အခါသုံးရတယ်။ page ကို refresh လုပ်လိုက်တဲ့အခါ session ထဲမှာသိမ်းထားတယ့်ဟာက မရှိတော့ဘူး။ အဲ့လိုဖြစ်အောင်လုပ်တာ
        return redirect('/')->with('success', 'Welcome Dear '.$user->name);
        //ဒီလို redirect function ရဲ့အနောက်ကနေလဲ with function ကိုသုံးပြီးရေးလို့ရတယ်။ session ကိုမသုံးပဲ
    }
}
