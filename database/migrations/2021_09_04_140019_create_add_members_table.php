<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_members', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('alt');
            $table->string('name');
            $table->string('slug');
            $table->longText('about');
            $table->longText('keywords');
            $table->string('email')->unique();
            $table->string('tel')->unique();
            $table->string('add_role_id');//->constrained()->cascadeOnDelete();
            $table->string('facebookAccount')->unique();
            $table->string('twitterAccount')->unique();
            $table->string('instagramAccount')->unique();
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
        Schema::dropIfExists('add_members');
    }
}
