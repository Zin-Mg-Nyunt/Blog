<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $with=['category','author'];//$with[] ထဲမှာ ထည့်ထားတဲ့ဟာက relationship တွေ(method တွေ)။ အဲ့လိုရေးထားလိုက်ရင် web.php မှာ with() တွေ load() တွေနဲ့ eager load ပုံစံတွေရေးစရာမလိုတော့ဘူး

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
