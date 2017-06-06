<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('parks', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('short_name');
          $table->string('park_id');
          $table->string('resort');
          $table->string('region');
          $table->string('city');
          $table->string('country');
          $table->boolean('is_intl');
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
      Schema::drop('parks');
    }
}
