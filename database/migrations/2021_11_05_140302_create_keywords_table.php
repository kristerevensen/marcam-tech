<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('project_token');
            $table->string('keyword');
            $table->string('keyword_id')->unique();
            $table->string('task_id');

            $table->integer('location_code');
            $table->string('language_code');
            $table->boolean('search_partners');
            $table->float('competition');
            $table->float('cpc');
            $table->integer('search_volume');
            $table->array('search_categories');
            $table->integer('jan_volume');
            $table->integer('feb_volume');
            $table->integer('mar_volume');
            $table->integer('apr_volume');
            $table->integer('may_volume');
            $table->integer('jun_volume');
            $table->integer('jul_volume');
            $table->integer('aug_volume');
            $table->integer('sep_volume');
            $table->integer('oct_volume');
            $table->integer('nov_volume');
            $table->integer('dec_volume');
            $table->integer('year');
            $table->foreign('keywords_project_token')->references('project_token')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keywords');
    }
}
