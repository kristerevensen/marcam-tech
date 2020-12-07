<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('custom_parameter');
            $table->string('project_token');
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
        Schema::dropIfExists('custom_parameters');
    }
}
