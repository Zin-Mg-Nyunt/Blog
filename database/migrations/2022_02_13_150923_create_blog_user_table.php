<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //pivot table ဆိုတာက many to many relationship အတွက် လိုအပ်လို့တည်ဆောက်တာ
        //တစ်ခြားtable တွေမှာ id column တစ်ခုပဲရှိတယ်။ pivot table မှာတော့ id column မရှိဘူး အဲ့အစား ချိတ်ဆက်မယ့် table နှစ်ခုရဲ့ id တွေကို foreignId လှမ်းထောက်။
        //ပြီးတော့ တူညီတဲ့ id တွေထပ်မဝင်နိုင်အောင် primary ပေးတယ့်အခါ column နှစ်ခုလုံးကို primary ပေးရမယ်
        Schema::create('blog_user', function (Blueprint $table) {
            $table->primary(['blog_id','user_id']);
            $table->foreignId('blog_id');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_user');
    }
}
