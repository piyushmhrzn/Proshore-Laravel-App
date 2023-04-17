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
        Schema::table('organizations', function (Blueprint $table) {
            $table->renameColumn('roles', 'designations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->renameColumn('designations', 'roles');
        });
    }
};

// php artisan make:migrations rename_roles_in_organizations_table --table="organizations"
// composer update
// composer require doctrine/dbal
// php artisan migrate