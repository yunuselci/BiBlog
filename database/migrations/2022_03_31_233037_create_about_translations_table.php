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
        Schema::create('about_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->unsignedBigInteger('about_id');
            $table->unique(['about_id','locale']);
            $table->foreign('about_id')->references('id')->on('abouts')
                ->onDelete('cascade');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->longText('description');
            $table->boolean('published')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_translations');
    }
};
