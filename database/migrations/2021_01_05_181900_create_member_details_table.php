<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('member_id');
            $table->string('admition_number', 150)->unique()->nullable(true);
            $table->integer('grade_of_admition')->nullable(true);
            $table->string('parent_name', 150)->nullable(true);
            $table->string('occupation', 150)->nullable(true);
            $table->text('office_address')->nullable(true);
            $table->string('office_contact_number', 150)->nullable(true);
            $table->text('special_skils')->nullable(true);
            $table->string('nic', 150)->unique()->nullable(true);
            $table->string('marital_status', 150)->nullable(true);
            $table->string('spouse_name', 150)->nullable(true);
            $table->date('doa')->nullable(true);
            $table->string('service_grade', 150)->nullable(true);
            $table->text('height_education_collification')->nullable(true);
            $table->text('height_proficinal_collification')->nullable(true);
            $table->text('special_responsibilities')->nullable(true);
            $table->year('yor')->nullable(true);
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
        Schema::dropIfExists('member_details');
    }
}
