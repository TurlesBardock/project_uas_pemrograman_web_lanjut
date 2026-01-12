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
        Schema::table('posts', function (Blueprint $table) {
            // slug sudah ada → jangan tambah
            // category_id sudah ada → jangan tambah

            $table->enum('status', ['draft', 'published', 'scheduled'])
                ->default('draft')
                ->after('content');

            $table->timestamp('published_at')
                ->nullable()
                ->after('status');

            $table->foreignId('user_id')
                ->after('published_at');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn([
                'status',
                'published_at',
                'user_id',
            ]);
        });
    }
};
