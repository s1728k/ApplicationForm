<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_listing', function (Blueprint $table) {
            $table->increments('id');
            $table->text('images')->nullable();
            $table->text('attachments')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('size')->nullable();
            $table->string('available_for')->nullable();
            $table->string('no_of_people_allowed')->nullable();
            $table->string('price')->nullable();
            $table->text('house_description')->nullable();
            $table->text('house_address')->nullable();
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
        Schema::dropIfExists('house_listing');
    }
}
