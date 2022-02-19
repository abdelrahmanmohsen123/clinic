<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorassessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctorassessments', function (Blueprint $table) {
            $table->id();
            $table->text('diagnose');
            $table->text('prescription');
            $table->text('lab_test');
            $table->text('other_procedure')->nullable();
            $table->unsignedBigInteger('patient_id')->index();
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
        Schema::dropIfExists('doctorassessments');
    }
}
