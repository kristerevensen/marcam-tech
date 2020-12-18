<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('analysis_token')->index();
            $table->integer('week')->nullable();
            $table->integer('month')->nullable();
            $table->string('channel')->nullable();
            $table->string('channel_token')->nullable();
            $table->string('import_type')->nullable();
            $table->string('import_type_token')->index();
            $table->string('import_name')->nullable();
            $table->integer('year')->nullable();
            $table->unsignedInteger('users')->nullable();
            $table->unsignedInteger('sessions')->nullable();
            $table->unsignedInteger('pageviews')->nullable();
            $table->float('avgorder')->nullable();
            $table->unsignedInteger('transactions')->nullable();
            $table->unsignedBigInteger('revenue')->nullable();
            $table->unsignedFloat('bouncerate')->nullable();
            $table->unsignedFloat('exitrate')->nullable();
            $table->bigInteger('pagevalue')->nullable();
            $table->string('project_token');
            $table->foreign('project_token')
                ->references('project_token')
                ->on('projects')
                ->onDelete('cascade');
            $table->foreign('analysis_token')
                ->references('analysis_token')
                ->on('analyses')
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
        Schema::dropIfExists('channels');
    }
}
