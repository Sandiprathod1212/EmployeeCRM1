<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('leaves', 'employee_name')) {
            Schema::table('leaves', function (Blueprint $table) {
                $table->string('employee_name')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('leaves', 'employee_name')) {
            Schema::table('leaves', function (Blueprint $table) {
                $table->dropColumn('employee_name');
            });
        }
    }
};
