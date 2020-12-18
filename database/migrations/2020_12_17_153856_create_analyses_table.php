<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('import_name')->nullable();
            $table->string('import_type')->index();
            $table->string('import_type_token')->nullable();
            $table->string('analysis_token')->index();
            $table->string('project_token')->index();
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
        Schema::dropIfExists('analyses');
    }
}
