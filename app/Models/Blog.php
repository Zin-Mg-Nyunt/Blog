<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

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
            $query->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        });
        //category ကို filter လုပ်တုန်းကလိုပဲ username နဲ့ filter လုပ်တာ
        $query->when($filter['username']??false, function ($query, $username) {
            $query->whereHas('author', function ($query) use ($username) {
                $query->where('username', $username);
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function subscriber()
    {
        return $this->belongsToMany(User::class);
    }
    public function unSubscribe()
    {
        //this ဆိုတာက အခု unsubscribe လုပ်လိုက်တဲ့ blog. အဲ့ blog ရဲ့ subscriber တွေထဲကမှ အခု login ဝင်ထားတဲ့ user ရဲ့ id ကို ဖြုတ်ချတာ
        $this->subscriber()->detach(auth()->user()->id);
    }
    public function subscribe()
    {
        //this ဆိုတာက အခု unsubscribe လုပ်လိုက်တဲ့ blog. အဲ့ blog ရဲ့ subscriber တွေထဲကမှ အခု login ဝင်ထားတဲ့ user ရဲ့ id ကို တွဲ့ပေးလိုက်တာ
        $this->subscriber()->attach(auth()->user()->id);
    }
}
