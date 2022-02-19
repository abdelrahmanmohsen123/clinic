<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->enum('visit_type', ['Examnation', 'Consultation']);
            $table->float('price');
            $table->unsignedBigInteger('schedule_id')->index();
            $table->unsignedBigInteger('patient_id')->index();

            $table->foreign('schedule_id')
                  ->references('id')
                  ->on('schedules')
                  ->onUpdate('CASCADE')
                  ->onDelete('CASCADE');

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onUpdate('CASCADE')
                  ->onDelete('CASCADE');
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
        Schema::dropIfExists('visits');
    }
}
