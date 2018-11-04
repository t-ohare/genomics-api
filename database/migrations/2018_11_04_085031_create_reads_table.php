<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadsTable extends Migration
{

    public function up()
    {
        Schema::create('reads', function(Blueprint $table) {
            $table->increments('id');
            $table->string('read');
            $table->string('search');
            // Constraints declaration
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('reads');
    }
}
