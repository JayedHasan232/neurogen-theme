<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->boolean('privacy')->default(true);
            $table->smallInteger('position')->nullable();
            $table->string('title');
            $table->text('overview');
            
            $table->text('link');
            $table->string('link_title');
            
            $table->text('image')->nullable();
            $table->text('image_medium')->nullable();
            $table->text('image_small')->nullable();

            $table->foreignId('created_by');
            $table->foreignId('updated_by')->nullable();
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
        Schema::dropIfExists('sliders');
    }
}
