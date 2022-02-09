<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvatarColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable()->default("https://www.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png")->after('username');
            //default ဆိုတာက profile picture ကို user က ဝင်ဝင်ချင်းမထည့်ရင် default အနေနဲ့ထည့်ပေးထားလို့ရအောင်သုံးတာ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
        });
    }
}
