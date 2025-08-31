<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->renameColumn('name', 'firstname');
        });

        Schema::table('staff', function (Blueprint $table) {
            $table->string('middlename');
            $table->string('lastname');
            $table->string('address')->after('email');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->renameColumn('firstname', 'name');
        });

        Schema::table('staff', function (Blueprint $table) {
            $table->dropColumn('middlename');
            $table->dropColumn('lastname');
            $table->dropColumn('address');
        });

    }
};
