<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable()->index();
            $table->unsignedBigInteger('writer_id')->nullable()->index();
            $table->longText('description')->nullable();
            $table->string('ad_link')->nullable();
            $table->unsignedTinyInteger('ad_count')->default(0);
            $table->unsignedBigInteger('ad_coin')->default(0);
            $table->longText('content_description')->nullable();
            $table->string('image')->nullable();
            $table->integer('like_count')->nullable()->default(0);
            $table->string('status')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
