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
        Schema::create('jobs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('lot', 250)->nullable();
            $table->string('street_no', 250)->nullable();
            $table->string('street_name', 250)->nullable();
            $table->string('suburb', 250)->nullable();
            $table->string('postal_code', 250)->nullable();
            $table->string('email', 250)->nullable();
            $table->string('mobile_no', 250)->nullable();
            $table->string('name', 250)->nullable();
            $table->string('job', 20)->nullable();
            $table->string('soil_test', 20)->nullable();
            $table->string('surveys', 20)->nullable();
            $table->string('other_jobs', 20)->nullable();
            $table->string('feature_surveys', 20)->nullable();
            $table->tinyInteger('required_ahd')->nullable();
            $table->string('ahd_ffl', 20)->nullable();
            $table->tinyInteger('footing_probe')->nullable();
            $table->tinyInteger('bal')->nullable();
            $table->tinyInteger('wind_rating')->nullable();
            $table->tinyInteger('locked_gates')->nullable();
            $table->tinyInteger('house_on_site')->nullable();
            $table->tinyInteger('sub_un_con')->nullable();
            $table->tinyInteger('future_base')->nullable();
            $table->tinyInteger('percolation_test')->nullable();
            $table->tinyInteger('acid_sulfate_test')->nullable();
            $table->string('description', 250)->nullable();
            $table->string('reference', 250)->nullable();
            $table->longText('file_input')->nullable();
            $table->string('status', 250)->nullable();
            $table->string('holdreason')->nullable();
            $table->timestamp('site_visit_date')->nullable();
            $table->timestamp('report_due_date')->nullable();
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->string('created_by', 250)->nullable();
            $table->string('updated_at', 250)->nullable();
            $table->string('updated_by', 250)->nullable();
            $table->boolean('notify')->nullable()->default(false);
            $table->boolean('status_notify')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
