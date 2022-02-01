<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->foreignId('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            //foreign key constrained တွေကို blog ဖျက်တာနဲ့ အဲ့ blog မှာရေးထားတဲ့ comment ပျက် | user ဖျက်တာနဲ့ အဲ့ user ရေးထားတဲ့ comment ပျက် အဲ့လိုဖြစ်စေချင်ရင် သုံးရတယ်
            // references($column)->on($table) === constrained() အတူတူပဲ
            //onDelete('cascade') === cascadeOnDelete အတူတူပဲ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
