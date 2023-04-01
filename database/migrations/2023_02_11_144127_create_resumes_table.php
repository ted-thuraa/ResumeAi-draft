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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class, 'user_id');
            
            $table->string('title', 1000);
            $table->string('slug', 1000)->nullable();
            $table->string('template', 1000)->default('apollo');
            $table->string('first_name', 1000)->nullable();
            $table->string('last_name', 1000)->nullable();
            $table->string('email', 1000)->nullable();
            $table->string('phone', 1000)->nullable();
            $table->string('city', 1000)->nullable();
            $table->string('state', 1000)->nullable();
            $table->string('address', 1000)->nullable();
            $table->string('country', 1000)->nullable();
            $table->string('Zipcode', 1000)->nullable();
            $table->text('skills')->nullable()->nullable();
            $table->text('language')->nullable()->nullable();
            $table->text('professional_summary')->nullable();
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
        Schema::dropIfExists('resumes');
    }
};
