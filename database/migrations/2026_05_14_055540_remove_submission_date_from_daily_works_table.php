<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('daily_works', 'submission_date')) {
            Schema::table('daily_works', function (Blueprint $table) {
                $table->dropColumn('submission_date');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasColumn('daily_works', 'submission_date')) {
            Schema::table('daily_works', function (Blueprint $table) {
                $table->date('submission_date')->nullable();
            });
        }
    }
};
