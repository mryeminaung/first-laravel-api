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
            $table->id('book_id');
            $table->string('author')->comment('author\'s name');
            // unique method ထဲက name က custom index key ဖြစ်
            $table->string('email')->unique('my_email');
            $table->double('price');
            $table->enum('level', ['easy', 'medium', 'hard'])->nullable();
            $table->boolean('isStock')->default(true);
            $table->date('published_at');
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
