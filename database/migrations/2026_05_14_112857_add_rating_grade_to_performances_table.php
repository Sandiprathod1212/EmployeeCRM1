<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('performances', 'rating_grade')) {
            Schema::table('performances', function (Blueprint $table) {
                $table->string('rating_grade')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('performances', 'rating_grade')) {
            Schema::table('performances', function (Blueprint $table) {
                $table->dropColumn('rating_grade');
            });
        }
    }
};
