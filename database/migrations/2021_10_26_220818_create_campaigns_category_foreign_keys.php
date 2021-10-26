<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsCategoryForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns_category', function (Blueprint $table) {
            $table->foreign('project_token')->references('project_token')->on('projects')->onDelete('cascade');
            $table->foreign('campaign_token')->references('campaign_token')->on('campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns_category', function (Blueprint $table){
            $table->dropForeign('campaigns_category_campaign_token_foreign');
            $table->dropForeign('campaigns_category_project_token_foreign');
        });
    }
}
