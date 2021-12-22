<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=['id'];//$guarded ထဲမှာကတော့ ထည့်မပေးစေချင်တဲ့ colum ကိုရေးရတယ်။ ဘာမှမထည့်ပေးဘူးဆိုရင် colum အကုန်လုံးကို လက်ခံတယ်လို့ဆိုလို။ guarded ထဲမှာ id လို့ထည့်ထားတော့ user က id ကိုလျှောက်ထည့်လိုက်လဲ laravel က ignore လုပ်ပလိုက်တယ်။

    // protected $fillable=['title','intro','body'];//$fillable ထဲမှာကတော့ ထည့်ပေးချင်တဲ့ data ထည့်ပေးချင်တဲ့ colum တွေကိုရေးရတယ်။မထည့်ပဲ data ထည့်ပေးလိုက်ရင် database ထဲကို data မရောက်ပဲ error ပြလိမ့်မယ်။

    //Eloquent Model Relationship သုံးဖို့ လိုတဲ့ method
    public function category()
    {
        return $this->belongsTo(Category::class); //belongsTo() က category တစ်ခုတည်းရှိလို့ တစ်ခုတည်းကိုပဲ ချိတ်မယ်ဆိုရင် သုံးရတာ။ Category::class ဆိုတာက namespace ပေးထားတဲ့ Category Model file ကို use လုပ်ပြီး လှမ်းချိတ်တာ
    }
}
