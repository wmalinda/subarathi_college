<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_full', 400);
            $table->string('name_with_initials', 400);
            $table->string('member_role', 20);
            $table->date('dob');
            $table->string('gender', 10);
            $table->text('address')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('mobile')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('profile_picture')->nullable(true);
            $table->boolean('status')->default(1)->comment("1=>active,0=>inactive");
            $table->boolean('membership_status')->default(1)->comment("1=>active,0=>inactive");
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
        Schema::dropIfExists('members');
    }
}
