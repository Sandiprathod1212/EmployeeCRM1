<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('employees', 'manager_id')) {
            Schema::table('employees', function (Blueprint $table) {
                $table->unsignedBigInteger('manager_id')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('employees', 'manager_id')) {
            Schema::table('employees', function (Blueprint $table) {
                $table->dropColumn('manager_id');
            });
        }
    }
};
