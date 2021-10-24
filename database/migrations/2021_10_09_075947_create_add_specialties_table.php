<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddSpecialtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_specialties', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->longText('alt');
            $table->string('name');
            $table->string('slug');
            $table->string('url');
            $table->foreignId('add_college_id')->constrained()->cascadeOnDelete();
            $table->longText('about');
            $table->longText('keywords');
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
        Schema::dropIfExists('add_specialties');
    }
}
