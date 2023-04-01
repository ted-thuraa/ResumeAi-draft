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
        Schema::create('resume_addsections', function (Blueprint $table) {
            $table->id();
            $table->string('title', 300)->nullable();
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
        Schema::dropIfExists('resume_addsections');
    }
};
