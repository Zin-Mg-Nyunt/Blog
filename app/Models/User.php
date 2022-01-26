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
    protected $guarded=['id'];
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

    //Accessors
    public function getNameAttribute($value) //getColumnAttribute()
    {
        return ucwords($value);
    }

    //Mutators
    public function setPasswordAttribute($value) //setColumnAttribute()
    {
        return $this->attributes['password']=bcrypt($value);
    }//$this->attributes ဆိုတာက ဒီmodel/class ရဲ့ attributes တွေထဲက password ဆိုတဲ့ attribute ကိုရွေးလိုက်တာ။ Table ထဲမှာဆိုရင်တော့ column လို့ခေါ်တယ်
}
