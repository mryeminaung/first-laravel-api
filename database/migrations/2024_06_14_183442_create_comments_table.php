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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('blog_id')->constrained('blogs')->cascadeOnDelete();
            $table->timestamps();
            // $table->foreignId('blog_id')->references('id')->on('blogs')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('blog_id')->references('id')->on('blogs')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
