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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('orgn_id')->nullable()->constrained('organizations', 'id')->cascadeOnUpdate()->nullOnDelete();
            $table->string('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['orgn_id']);
            $table->dropColumn('orgn_id');
        });

        Schema::dropIfExists('users');
    }
};
