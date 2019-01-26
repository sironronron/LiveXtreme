<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('birthday')->nullable()->after('email');
            $table->integer('gender_id')->unsigned()->nullable()->after('birthday');
            $table->string('phone', 11)->nullable()->after('gender_id');
            $table->string('country')->nullable()->after('phone');
        });
    
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('gender_id')->references('id')->on('genders');
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
            $table->dropColumn('birthday');
            $table->dropColumn('gender_id');
            $table->dropColumn('phone');
            $table->dropColumn('country');
        });
    }
}
