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
        Schema::create('resumelinks', function (Blueprint $table) {
            $table->id();
            $table->string('label', 500)->nullable();
            $table->text('url', 500)->nullable();
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
        Schema::dropIfExists('resumelinks');
    }
};
