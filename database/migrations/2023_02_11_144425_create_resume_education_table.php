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
        Schema::create('resume_education', function (Blueprint $table) {
            $table->id();
            $table->string('school_name', 300)->nullable();
            $table->string('school_city', 300)->nullable();
            $table->string('school_state', 200)->nullable();
            $table->string('school_country', 200)->nullable();
            $table->string('certification', 500)->nullable();
            $table->timestamp('startschool_date')->nullable();
            $table->timestamp('endschool_date')->nullable();
            $table->longText('school_description')->nullable();
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
        Schema::dropIfExists('resume_education');
    }
};
