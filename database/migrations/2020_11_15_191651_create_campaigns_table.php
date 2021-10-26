<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('campaign_name');
            $table->float('campaign_spend')->nullable();
            $table->string('project_token')->key(); //token
            $table->string('campaign_token')->key(); //token
            $table->integer('created_by'); //user_id
            $table->string('template')->nullable(); //template id
            $table->string('category')->nullable(); 
            $table->string('model')->nullable(); 
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->enum('status',array('1','0'))->default('1')->nullable();
            $table->enum('reporting',array('1','0'))->default('0')->nullable();
            $table->enum('force_lowercase',array('1','0'))->default('1')->nullable();
            $table->enum('utm_activated',array('1','0'))->default('1')->nullable();
            $table->enum('monitor_urls',array('1','0'))->default('1')->nullable();
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
        Schema::dropIfExists('campaigns');
    }
}
