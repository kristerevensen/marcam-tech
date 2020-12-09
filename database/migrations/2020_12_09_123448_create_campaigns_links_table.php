<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns_links', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('landing_page');
            $table->string('link_token');
            $table->string('project_token');
            $table->text('campaign_name')->nullable();
            $table->string('source')->nullable();
            $table->string('medium')->nullable();
            $table->string('term')->nullable();
            $table->string('content')->nullable();
            $table->string('target')->nullable();
            $table->string('campaign_id');
            $table->text('custom_parameters')->nullable();
            $table->foreign('campaign_id')
                    ->references('id')
                    ->on('campaigns')
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
        Schema::dropIfExists('campaigns_links');
    }
}
