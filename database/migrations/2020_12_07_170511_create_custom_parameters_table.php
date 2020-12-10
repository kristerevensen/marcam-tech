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
        Schema::create('campaigns_custom_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('custom_parameter');
            $table->string('project_token');
            $table->enum('required',array('1','0'))->default('0');
            $table->enum('automatic',array('1','0'))->default('0');
            $table->enum('active',array('1','0'))->default('1');
            $table->string('prefix')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('campaigns_custom_parameters');
    }
}
