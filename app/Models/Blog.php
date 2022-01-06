<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $with=['category','author'];
    
    //logical grouping ကို where နဲ့ orWhere တွဲသုံးတဲ့ နေရာတိုင်းမှာ သုံးပေးရမယ်
    public function scopeFilter($query, $filter)//Blog::latest()->filter()
    {
        //logical grouping ကိုဘယ်လိုသုံးလဲဆိုတော့ where method ခေါ်ပြီးသုံးတယ် where method ထဲမှာ callback function တစ်ခုထည့်ရတယ်။ အဲ့ callback function ရဲ့ parameter ထဲမှာ where အရှေ့က query ကိုပြန်ထည့်တယ်။ ပြီးတော့ အဲ့ callback function ထဲမှာ group လုပ်ချင်တဲ့ logic ကိုထည့်
        //callback function ထဲမှာ variable တွေကို ဒီတိုင်းသုံးလို့မရတဲ့တွက် use လုပ်ပြီးမှ ခေါ်သုံးရတယ်
        $query->when($filter['search']??false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%'.$search.'%')
                ->orWhere('body', 'LIKE', '%'.$search.'%');
            })
            ->where('title', 'backend');
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
//logical grouping

//eg:
//name = 'mg mg' or name = 'tun tun' and age > 20
//နာမည်က မောင်မောင် သို့မဟုတ် ထွန်းထွန်း ဖြစ်ပြီးတော့ အသက်က ၂၀ထက်ကြီးရမယ်
//အဲ့လိုဖြစ်ချင်တာ အဲ့မှာ အရေကြီးတဲ့ logical grouping တွေလိုပြီ။
//logical grouping ဆိုတာ () ကွင်းလေးတွေကိုပြောတာ
//နာမည်က မောင်မောင်သို့မဟုတ် ထွန်းထွန်း အဲ့တာက logic တစ်ခု / အသက်က ၂၀ထက်ကြီးရမယ် အဲ့တာက logic တစ်ခု
//အဲ့တော့ () ကွင်းက ဒီလိုပါမှ ရမယ်
// (name = 'mg mg' or name= 'tun tun') and age > 20
// အဲ့တာမှသာ မှန်မယ်
