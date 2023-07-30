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
            $table->string('title');
            $table->longText('description');
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('author_id')->unsigned()->nullable();
            $table->string('added_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->decimal('price');
            $table->decimal('discount')->nullable();
            $table->bigInteger('qty');
            $table->string('edition');
            $table->string('language');
            $table->date('publication_date');
            $table->string('isbn')->unique();
            $table->string('image');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
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
