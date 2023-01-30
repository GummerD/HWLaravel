<?php

use App\Enumus\NewsStatusEnum;
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
    public function up():void
    {
        Schema::create('h_w__news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('author', 50)->default('User');
            $table->enum('status', NewsStatusEnum::all());
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():void
    {
        Schema::dropIfExists('h_w__news');
    }
};
