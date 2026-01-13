<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // hapus foreign key dulu
            $table->dropForeign(['category_id']);

            // lalu hapus kolom
            $table->dropColumn('category_id');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // kembalikan kalau rollback
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('news_categories')
                ->cascadeOnDelete();
        });
    }
};
