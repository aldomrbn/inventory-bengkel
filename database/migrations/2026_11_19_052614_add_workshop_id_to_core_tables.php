<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('workshop_id')->nullable()->after('id')->constrained('workshops')->nullOnDelete();
            $table->string('role')->default('admin')->after('workshop_id');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->foreignId('workshop_id')->nullable()->after('id')->constrained('workshops')->cascadeOnDelete();
        });

        Schema::table('spareparts', function (Blueprint $table) {
            $table->foreignId('workshop_id')->nullable()->after('id')->constrained('workshops')->cascadeOnDelete();
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreignId('workshop_id')->nullable()->after('id')->constrained('workshops')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->after('workshop_id')->constrained('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
            $table->dropConstrainedForeignId('workshop_id');
        });

        Schema::table('spareparts', function (Blueprint $table) {
            $table->dropConstrainedForeignId('workshop_id');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropConstrainedForeignId('workshop_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropConstrainedForeignId('workshop_id');
        });
    }
};