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
        Schema::create('estimation', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('first_name', 250);
            $table->string('mobile_no', 250);
            $table->string('email', 250);
            $table->string('job_id', 250);
            $table->string('location', 250);
            $table->string('message', 250);
            $table->string('image', 250);
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->string('created_by', 250);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimation');
    }
};
