<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('lid', 255);
            $table->string('content', 10000);
            $table->string('image', 255);
            $table->integer('rubric_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('articles', function($table) {
            $table->foreign('rubric_id')
                ->references('id')->on('rubrics')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
