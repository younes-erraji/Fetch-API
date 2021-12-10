<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up() {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country_code');
            $table->string('district')->nullable();
            $table->string('population')->nullable();
        });
    }

    public function down() {
        Schema::dropIfExists('cities');
    }
}
