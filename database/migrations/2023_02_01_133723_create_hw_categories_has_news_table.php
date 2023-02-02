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
        Schema::create('hw_categories_has_news', function (Blueprint $table) {
            $table->foreignId('hw_category_id')
                ->references('id')
                ->on('h_w__categories')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('hw_news_id')
                ->references('id')
                ->on('h_w__news')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
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
        Schema::dropIfExists('hw_categories_has_news');
    }
};
