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
        Schema::create('weddingcakesdeposits', function (Blueprint $table) {
            $table->id();
			$table->string('consultation_preference');
			$table->string('existing_design')->nullable();
			$table->date('wedding_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weddingcakesdeposits');
    }
};
