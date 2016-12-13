<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table -> integer('content_type_id') -> unsigned() -> default(0);
            $table->foreign('content_type_id')
                    ->references('id')->on('content_type')
                    ->onDelete('cascade');
            $table->string('title');
            $table->string('tags');
            $table->text('summary');
            $table->text('body');
            $table->string('image');
            $table->tinyInteger('ismenu');
            $table->string('title_menu');
            $table->text('description_menu');
            $table->integer('parent_menu');
            $table->integer('weight_menu');
            $table->timestamps();
            $table->tinyInteger('iscomment');
            $table->string('byauthored');
            $table->dateTime('onauthored');
            $table->tinyInteger('ispublish');
            $table->tinyInteger('isfrontend');
            $table->tinyInteger('istoplist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
