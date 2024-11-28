<?php

use App\Enums\JobType as EnumJobType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title', 100);
            $table->string('slug', 300)->unique();
            $table->text('description');
            $table->integer('salary')->default(1);
            $table->string('tags')->nullable();
            $table->enum('job_type', array_map(fn($type) => $type->value, EnumJobType::cases()))->default(EnumJobType::FullTime->value);
            $table->boolean('remote')->default(0);
            $table->text('requirements')->nullable();
            $table->string('benefits')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('contact_email')->unique();
            $table->string('contact_phone')->unique();
            $table->string('company_name')->nullable();
            $table->text('company_description')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_website')->unique()->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
