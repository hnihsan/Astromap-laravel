<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('target', function (Blueprint $table) {
          $table->foreign('periode_id')->references('id')->on('periode');
          $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('task', function (Blueprint $table) {
          $table->foreign('target_id')->references('id')->on('target');
        });

        Schema::table('score', function (Blueprint $table) {
          $table->foreign('task_id')->references('id')->on('task');
          $table->foreign('mentor_id')->references('id')->on('users');
        });

        Schema::table('komentar', function (Blueprint $table) {
          $table->foreign('task_id')->references('id')->on('task');
          $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('reminder', function (Blueprint $table) {
          $table->foreign('task_id')->references('id')->on('task');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
