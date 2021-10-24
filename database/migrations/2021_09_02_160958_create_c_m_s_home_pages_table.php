<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCMSHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_m_s_home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('headerImage');
            $table->longText('altHeaderImage');
            $table->longText('about');
            $table->longText('keywords');
            $table->string('address');
            $table->string('tel');
            $table->string('email');
            $table->string('mapImage');
            $table->longText('altMapImage');
            $table->longText('whatsAppID');
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
        Schema::dropIfExists('c_m_s_home_pages');
    }
}
