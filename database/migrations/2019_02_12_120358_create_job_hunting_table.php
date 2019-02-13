<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobHuntingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_hunting', function (Blueprint $table) {
            $table->increments('id');
            $table->text('images')->nullable();
            $table->text('attachments')->nullable();
            $table->string('name')->nullable();
            $table->string('job_title')->nullable();
            $table->text('job_description')->nullable();
            $table->text('skill_set')->nullable();
            $table->string('salary_expected')->nullable();
            $table->text('job_location')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('spin')->nullable();
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
        Schema::dropIfExists('job_hunting');
    }
}
