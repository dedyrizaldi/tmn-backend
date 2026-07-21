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
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->foreignId('news_category_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('title');
            $table->string('slug')->unique();

            $table->string('author')->nullable();

            $table->text('excerpt')->nullable();

            $table->longText('content')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->boolean('featured')->default(false);

            $table->integer('sort_order')->default(0);

            $table->enum('status', [
                'draft',
                'published',
            ])->default('draft');

            $table->timestamp('published_at')->nullable();

            $table->timestamps();

            $table->index('slug');
            $table->index('status');
            $table->index('featured');
            $table->index('sort_order');
            $table->index('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};