<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->boolean('privacy')->default(true);
            $table->smallInteger('position')->nullable();
            $table->string('title');
            $table->string('url');
            $table->longText('article')->nullable();
            $table->text('tags')->nullable();
            
            $table->integer('category_id');
            $table->integer('sub_category_id')->nullable();
            
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            
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
        Schema::dropIfExists('blogs');
    }
}
