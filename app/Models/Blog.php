<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $with=['category','author'];//$with[] ထဲမှာ ထည့်ထားတဲ့ဟာက relationship တွေ(method တွေ)။ အဲ့လိုရေးထားလိုက်ရင် web.php မှာ with() တွေ load() တွေနဲ့ eager load ပုံစံတွေရေးစရာမလိုတော့ဘူး

    // scopequery ရေးနည်း
    //scopeFilter ရဲ့ first parameter ထဲမှာ filter method ကိုခေါ်ထားတဲ့ query[Blog::latest()] ကို ထည့်ပေးရတယ်
    //scopeFilter ရဲ့ second parameter ထဲမှာ filter method ကပို့ပေးလိုက်တဲ့ data ကိုလက်ခံလို့ရတယ်
    //array ပုံစံနဲ့ရေးထားတော့ ကြိုက်တာနဲ့ စစ်လို့ရသွားပြီ။ author နဲ့ပဲစစ်စစ်၊ category နဲ့ပဲစစ်စစ်
    public function scopeFilter($query, $filter)//Blog::latest()->filter()
    {
        //$filter['search']??false ဆိုတာက $filter['search'] ဆိုတဲ့ထဲမှာ search data ရှိရင် အဲ့search data ကိုထည့်ပြီး မရှိရင် false ကိုထည့်(terniary operator ကို အတိုကောက်ရေးတဲ့ပုံစံ)။ false ဝင်သွားရင် second parameter ထဲက callback function ကအလုပ်လုပ်စရာမလိုတော့ဘူး
        //ဘယ်လိုအချိန်မှာ search data မရှိဘူးလဲဆိုရင် website ထဲကို ဝင်ခါစ အချိန်မှာဆိုရင် ဘာsearch data မှမရှိဘူး အဲ့လိုအချိန်ဆိုရင် when ရဲ့ first parameter ထဲကို false ကဝင်သွားပြီ အနောက်က callback function ကအလုပ်လုပ်စရာမလိုတော့ဘူး
        $query->when($filter['search']??false, function ($query, $search) {
            $query->where('title', 'LIKE', '%'.$search.'%')
                ->orWhere('body', 'LIKE', '%'.$search.'%');
        });
    }

    //Eloquent Model Relationship သုံးဖို့ လိုတဲ့ method
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()// method တွေက အရေးကြီးတယ်။ laravel က method name ကိုကြည့်ပြီး foreignId ရဲ့ key ကိုရှာပေးတာ(exp: method name က user ဆိုရင် foreignId ရဲ့ key က user_id,method name က author ဆိုရင် foreignId ရဲ့ key က author_id )
    //အဲ့တော့ laravel ကို method name ကိုကြည့်ပြီး foreignId ရဲ့ key ကိုရှာမပေးစေချင်ရင် belongsTo မှာ second parameter ပေးလို့ရတယ်
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
