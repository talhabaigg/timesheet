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
        Schema::create('swms', function (Blueprint $table) {
            $table->id();
            $table->string('swms_name');
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('swms_filepath');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('swms');
    }
};
