<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('daily_works', 'submitted_at')) {
            Schema::table('daily_works', function (Blueprint $table) {
                $table->timestamp('submitted_at')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('daily_works', 'submitted_at')) {
            Schema::table('daily_works', function (Blueprint $table) {
                $table->dropColumn('submitted_at');
            });
        }
    }
};
