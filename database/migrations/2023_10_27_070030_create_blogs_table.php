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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail');
            $table->text('content');
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users');
            $table->dateTime('last_modified')->nullable();
            $table->unsignedBigInteger('category_id');
            // Add a foreign key constraint to link to the 'categories' table if applicable.
            // $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
            $table->softDeletes();     
           });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
