<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();//laravel က auto လုပ်ပေးတယ့် guarded ကို ပိတ်လိုက်တာ။ အဲ့တော့ data ထည့်တိုင်း သက်ဆိုင်ရာ Model တစ်ခုမှ guarded ကိုထည့်ပေးစရာမလိုတော့ဘူး
        Paginator::useBootstrap();
        // bootstrap library ကိုပြောင်းသုံးတာ
    }
}
