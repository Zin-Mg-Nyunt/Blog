<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password']=bcrypt($value);
    }

    public function subscribedBlogs()
    {
        return $this->belongsToMany(Blog::class);
    }
    public function isSubscribed($blog)
    {
        //login ဝင်ထားတဲ့ user က subscribedBlogs တွေရှိလား
        return auth()->user()->subscribedBlogs &&
        auth()->user()->subscribedBlogs->contains('id', $blog->id);
        //login ဝင်ထားတဲ့ user က subscribedBlogs ထဲမှာရှိတဲ့ id column ထဲမှာ dynamic ဝင်လာတဲ့ $blog ရဲ့ id ကရှိနေလား
        //subscribedBlogs ဆိုရင် subscribed လုပ်ထားတဲ့ blogs တွေပါတဲ့ collection တစ်ခုပြန်ရမယ်။ collection ဖြစ်တဲ့အတွက် collection ကပိုင်ဆိုင်တဲ့ method တွေထဲက contains method ကိုယူသုံးတယ်
        //contains ထဲက id ဆိုတာက subscribed လုပ်ထားတဲ့ blogs တွေ
        // [ <-ဒါက collection array
            //{'id'=>1,'title'='this is title',....} <-ဒါက blog object
            //{'id'=>3,'title'='this is title',....} <-ဒါက blog object
        // ]
        // id key ထဲမှာ dynamic ဝင်လာတဲ့ blog ရဲ့ id ကရှိနေလား။ ရှိနေရင် true return ပြန်တယ်။ မရှိရင် false return ပြန်တယ်
    }
}
