<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('template_name');
            $table->string('project_token');
            $table->string('source')->nullable();
            $table->string('medium')->nullable();
            $table->string('term')->nullable();
            $table->string('content')->nullable();
            $table->text('parameters')->nullable();

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
        Schema::dropIfExists('campaigns_templates');
    }
}
