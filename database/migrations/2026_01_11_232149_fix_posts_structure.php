<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {

            if (!Schema::hasColumn('posts', 'slug')) {
                $table->string('slug')->unique()->after('title');
            }

            if (!Schema::hasColumn('posts', 'image')) {
                $table->string('image')->nullable()->after('content');
            }

            if (!Schema::hasColumn('posts', 'status')) {
                $table->string('status')->default('draft')->after('image');
            }

            if (!Schema::hasColumn('posts', 'published_at')) {
                $table->timestamp('published_at')->nullable()->after('status');
            }

            if (!Schema::hasColumn('posts', 'category_id')) {
                $table->foreignId('category_id')->nullable()->after('published_at')
                    ->constrained('news_categories')
                    ->nullOnDelete();
            }

            if (!Schema::hasColumn('posts', 'user_id')) {
                $table->foreignId('user_id')->nullable()->after('category_id')
                    ->constrained()
                    ->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn([
                'slug',
                'image',
                'status',
                'published_at',
                'category_id',
                'user_id'
            ]);
        });
    }
};
