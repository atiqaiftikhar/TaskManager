<?php

use App\Constants\TaskPriority;
use App\Constants\TaskType;
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
        Schema::table('tasks', function (Blueprint $table) {
            // $table->string('type')->nullable()->default(TaskType::NORMAL);
            // $table->string('priority')->nullable()->default(TaskPriority::NORMAL);
            $table->string('type')->nullable()->default('normal');
            $table->string('priority')->nullable()->default('normal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
};
