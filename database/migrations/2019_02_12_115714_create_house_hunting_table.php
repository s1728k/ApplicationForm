<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseHuntingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_hunting', function (Blueprint $table) {
            $table->increments('id');
            $table->text('images')->nullable();
            $table->text('attachments')->nullable();
            $table->string('tenant_name')->nullable();
            $table->string('size')->nullable();
            $table->string('looking_for')->nullable();
            $table->string('no_of_people_to_stay')->nullable();
            $table->string('price_range')->nullable();
            $table->string('locality')->nullable();
            $table->text('house_description')->nullable();
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
        Schema::dropIfExists('house_hunting');
    }
}
