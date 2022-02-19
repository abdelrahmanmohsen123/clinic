<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_procedures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bill_id')->index();
            $table->unsignedBigInteger('procedure_id')->index();

            
            $table->foreign('bill_id')
                  ->references('id')
                  ->on('bills')
                  ->onUpdate('CASCADE')
                  ->onDelete('CASCADE');


            $table->foreign('procedure_id')
                  ->references('id')
                  ->on('procedures')
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
        Schema::dropIfExists('bill_procedures');
    }
}
