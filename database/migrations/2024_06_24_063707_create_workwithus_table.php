<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkwithusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workwithus', function (Blueprint $table) {
            $table->id();
            $table->string('job_reference');
            $table->string('name');
            $table->string('email');
            $table->string('telephone');
            $table->string('driving_license');
            $table->text('why_ideal');
            $table->text('relevant_experience');
            $table->string('current_position_duration');
            $table->string('portfolio')->nullable();
            $table->string('cv');
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
        Schema::dropIfExists('workwithus');
    }
}
