<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Foreign key already handled in create_leaves_table migration.
        // Kept as no-op to avoid SQLite/Railway migration crash.
    }

    public function down(): void
    {
        // No-op.
    }
};
