<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2)->nullable();
            $table->enum('condition', ['novo', 'polovno']);
            $table->string('image_path')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('location')->nullable();

            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
