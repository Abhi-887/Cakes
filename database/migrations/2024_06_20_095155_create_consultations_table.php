<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone');
            $table->date('event_date');
            $table->string('venue')->nullable();
            $table->string('number_of_guests')->nullable();
            $table->string('other_information')->nullable();
            $table->string('cake_budget');
            $table->string('consultation_store');
            $table->string('consultation_type');
            $table->string('existing_order');
            $table->string('cake_type');
            $table->string('booking_status')->nullable();
            $table->date('consultation_date');
            $table->string('consultation_time');
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
        Schema::dropIfExists('consultations');
    }
}

