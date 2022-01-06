<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $with=['category','author'];
    
    
    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search']??false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%'.$search.'%')
                ->orWhere('body', 'LIKE', '%'.$search.'%');
            });
        });
        $query->when($filter['category']??false, function ($query, $slug) {
            //အရင်တုန်းက category model ထဲကနေပြီးတော့ user ရှာတဲ့ category slug နဲ့ category table ထဲမှာ ရှိတဲ့ slug တူတဲ့ကောင်ကိုတိုက်စစ်ပြီး ရလာတဲ့ category ကနေပြီးတော့ သူနဲ့ဆိုင်တဲ့ blogs တွေကို blogs relationship method နဲ့ ပြန်ဆွဲထုတ်တာ
            //အခုကကျတော့ blog model ထဲကနေပြီးတော့ ဆွဲထုတ်မှာဆိုတော့ ပြောင်းပြန် model ကနေဆွဲထုတ်မှာ
            //ပြောင်းပြန်ဆွဲထုတ်တယ်ဆိုတာ
            //category model ထဲကနေပြီးတော့ အဲ့category နဲ့သက်ဆိုင်တဲ့ blogs ကိုဆွဲထုတ်တာမဟုတ်ပဲ blog model ထဲကနေပြီးတော့ အဲ့category နဲ့သက်ဆိုင်တဲ့ blogs ကိုဆွဲထုတ်တာ
            //အဲ့လိုအခြေအနေဆိုရင် whereHas ကိုသုံးပါမယ်
            $query->whereHas('category', function ($query) use ($slug) {
                // whereHas ထဲက first parameter က relationship method ကိုထည့်ရ
                //whereHas ကိုခေါ်ထားတာက $queryကနေခေါ်ထားတာ
                //အဲ့$query ဆိုတာက scopeFilter / filter() method ကိုခေါ်ထားတဲ့ Blog::latest() ဖြစ်တယ်။
                //ဆိုတော့ အဲ့$query ဆိုတာက Blog model ပဲဖြစ်တယ်။Blog model ဖြစ်တော့ သူ့ထဲမှာရှိတဲ့ relationship method တွေကိုပဲယူသုံးလို့ရမယ်
                //အခုလုပ်နေတာက category ကို filter လုပ်ချင်တာဆိုတော့ category relationship method ကိုယူသုံးမယ်
                //အဲ့တာကြောင့် whereHas ထဲက first parameter မှာ category relationship method ကိုထည့်
                //whereHas ထဲက second parameter မှာ callback function ထည့်
                // မှတ်ထားရမှာက callback function ကလက်ခံတဲ့ parameter($query) ဆိုတာက Blog model မဟုတ်တော့ဘူး။ categroy relationship method ကနေလာတဲ့ Category model ဖြစ်တယ်။ အဲ့တော့ category table ထဲက column တွေကို ယူကစားလို့ရပြီ။ user ထည့်လိုက်တဲ့ slug ကို category table ထဲက slug column နဲ့ condition တိုက်စစ်လို့ရသွားပြီ
                $query->where('slug', $slug);
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
