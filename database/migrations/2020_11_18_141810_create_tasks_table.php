<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_token');
            $table->string('title');
            $table->text('description')->nullable();
            $table->smallInteger('order')->default(0);
            $table->unsignedInteger('status_id');
            $table->dateTime('start_date');
            $table->integer('parent'); //taskID
            $table->integer('created_by'); //userID
            $table->integer('assigned_to'); //userID
            $table->timestamps();
            $table->foreign('project_token')
                    ->references('project_token')
                    ->on('projects')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
