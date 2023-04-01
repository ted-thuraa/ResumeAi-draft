<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('job_title', 300)->nullable();
            $table->string('employer', 300)->nullable();
            $table->string('job_city', 200)->nullable();
            $table->string('job_state', 200)->nullable();
            $table->string('job_country', 200)->nullable();
            $table->timestamp('startjob_date')->nullable();
            $table->timestamp('endjob_date')->nullable();
            $table->longText('description')->nullable();
            $table->foreignIdFor(\App\Models\Resume::class, 'resume_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resume_experiences');
    }
};
