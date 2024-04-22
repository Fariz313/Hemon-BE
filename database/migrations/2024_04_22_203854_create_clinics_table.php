<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('longitude', 10, 7); // longitude with 10 digits in total and 7 decimal places
            $table->decimal('latitude', 10, 7); // latitude with 10 digits in total and 7 decimal places
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clinics');
    }
}
