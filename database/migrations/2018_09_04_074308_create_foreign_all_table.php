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
        Schema::table('targets', function (Blueprint $table) {
          $table->foreign('periode_id')->references('id')->on('periode')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('challenges', function (Blueprint $table) {
          $table->foreign('mentor_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        
		  Schema::table('challenged_users', function (Blueprint $table) {
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade')->onUpdate('cascade');
        });
        
		  Schema::table('challenge_attachments', function (Blueprint $table) {
          $table->foreign('ch_user_id')->references('id')->on('challenged_users')->onDelete('cascade')->onUpdate('cascade');
        });
        
        Schema::table('tasks', function (Blueprint $table) {
          $table->foreign('target_id')->references('id')->on('targets')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('task_scores', function (Blueprint $table) {
          $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('mentor_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('komentar', function (Blueprint $table) {
          $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('reminders', function (Blueprint $table) {
          $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade')->onUpdate('cascade');
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
