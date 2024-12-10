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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('work_id')->constrained('works')->onDelete('cascade');
            $table->string('full_name', 300);
            $table->string('contact_phone', 18)->nullable();
            $table->string('contact_email', 255);
            $table->text('message')->nullable();
            $table->string('location')->nullable();
            $table->string('resume_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
