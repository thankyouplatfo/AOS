<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_universities', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->longText('alt');
            $table->string('name');
            $table->string('slug');
            $table->foreignId('add_countrie_id')->constrained()->cascadeOnDelete();
            $table->foreignId('add_citie_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->string('internationalRanking');
            $table->string('localRanking');
            $table->string('url');
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
        Schema::dropIfExists('add_universities');
    }
}
