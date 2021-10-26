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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('landing_page');
            $table->string('link_token')->key();
            $table->string('project_token')->key();
            $table->text('campaign_name')->nullable();
            $table->string('source')->nullable();
            $table->string('medium')->nullable();
            $table->string('term')->nullable();
            $table->string('content')->nullable();
            $table->string('target')->nullable();
            $table->text('tagged_url')->nullable();
            $table->text('marcam')->nullable();
            $table->unsignedInteger('campaign_id')->key();
            $table->text('custom_parameters')->nullable();
            
        
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
        Schema::dropIfExists('links');
    }
}
