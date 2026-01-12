<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            if (!Schema::hasColumn('posts', 'category_id')) {
                $table->foreignId('category_id')
                    ->nullable()
                    ->constrained('news_categories')
                    ->cascadeOnDelete();
            }

            if (!Schema::hasColumn('posts', 'status')) {
                $table->enum('status', ['draft', 'published', 'scheduled', 'archived'])
                    ->default('draft');
            }

            if (!Schema::hasColumn('posts', 'published_at')) {
                $table->timestamp('published_at')->nullable();
            }

            if (!Schema::hasColumn('posts', 'image')) {
                $table->string('image')->nullable();
            }

            if (!Schema::hasColumn('posts', 'user_id')) {
                $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            }
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasColumn('posts', 'category_id')) $table->dropColumn('category_id');
            if (Schema::hasColumn('posts', 'status')) $table->dropColumn('status');
            if (Schema::hasColumn('posts', 'published_at')) $table->dropColumn('published_at');
            if (Schema::hasColumn('posts', 'image')) $table->dropColumn('image');
            if (Schema::hasColumn('posts', 'user_id')) $table->dropColumn('user_id');
        });
    }
};
