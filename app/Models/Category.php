<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function blogs()
    {
        return $this->hasMany(Blog::class);// Category တစ်ခုမှာ blog တွေအများကြီး ရှိတယ်။အဲ့ blog တွေအများကြီးကို ချိတ်ဖို့ hasMany ကိုသုံးရတယ်
    }
}
