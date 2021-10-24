<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_colleges', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->longText('alt');
            $table->string('name');
            $table->string('slug');
            $table->string('type');
            $table->string('url');
            $table->foreignId('add_universitie_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('add_colleges');
    }
}
