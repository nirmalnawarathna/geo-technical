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
        Schema::create('schedules', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('first_name', 250);
            $table->string('last_name', 250);
            $table->string('email', 250);
            $table->timestamp('schedule_date')->useCurrentOnUpdate()->useCurrent();
            $table->time('schedule_time');
            $table->string('message', 250);
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
