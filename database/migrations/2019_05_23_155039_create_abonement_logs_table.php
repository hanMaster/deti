<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonementLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonement_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('abonement_id');
            $table->unsignedInteger('client_id');
            $table->integer('count');
            $table->string('comment',150);
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
        Schema::dropIfExists('abonement_logs');
    }
}
