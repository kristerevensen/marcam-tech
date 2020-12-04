<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->text('landing_page');
            $table->string('language');
            $table->string('location');
            $table->string('source');
            $table->string('medium');
            $table->string('term');
            $table->string('content');
            $table->string('target');
            $table->string('campaign_id');
            $table->foreign('campaign_id')
                    ->references('id')
                    ->on('campaigns')
                    ->onDelete('cascade');
            
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
        Schema::dropIfExists('links');
    }
}
