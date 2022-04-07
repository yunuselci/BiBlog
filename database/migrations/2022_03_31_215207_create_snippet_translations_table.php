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
        Schema::create('snippet_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->unsignedBigInteger('snippet_id');
            $table->unique(['snippet_id','locale']);
            $table->foreign('snippet_id')->references('id')->on('snippets')
                ->onDelete('cascade');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->longText('description');
            $table->string('slug');
            $table->integer('dev_to_article_id')->nullable();
            $table->boolean('published')->nullable()->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('snippet_translations');
    }
};
