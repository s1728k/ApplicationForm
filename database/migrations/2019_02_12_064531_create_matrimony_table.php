<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatrimonyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrimony', function (Blueprint $table) {
            $table->increments('id');
            $table->text('images')->nullable();
            $table->text('attachments')->nullable();
            $table->string('name')->nullable();
            $table->string('sex')->nullable();
            $table->string('date_time_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('religion')->nullable();
            $table->string('caste')->nullable();
            $table->string('gothram')->nullable();
            $table->string('education')->nullable();
            $table->string('profession')->nullable();
            $table->string('income')->nullable();
            $table->string('property')->nullable();
            $table->text('likes_and_dislikes')->nullable();
            $table->text('residential_address')->nullable();
            $table->text('permanent_address')->nullable();
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
        Schema::dropIfExists('matrimony');
    }
}
