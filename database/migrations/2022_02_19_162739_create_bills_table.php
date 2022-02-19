<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->float('total_price');
            $table->unsignedBigInteger('visit_id')->index();
            $table->unsignedBigInteger('patient_id')->index();

            $table->foreign('patient_id')
                    ->references('id')
                    ->on('patients')
                    ->onUpdate('CASCADE')
                    ->onDelete('CASCADE');

            $table->foreign('visit_id')
                  ->references('id')
                  ->on('visits')
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
        Schema::dropIfExists('bills');
    }
}
