<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentMove extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_move', function (Blueprint $table) {
            $table->id();
            // $table->foreign('ei_seq', 10)->references('ei_seq')->on('equipment_info');
            // $table->foreign('ns_tagnumber', 10)->references('ns_tagnumber')->on('equipment_info')->nullable();
            // $table->foreign('ns_serialnumber', 10)->references('ns_serialnumber')->on('equipment_info')->nullable();
            $table->integer('ei_seq', 11);
            $table->string('ns_tagnumber', 20);
            $table->string('ns_serialnumber', 50);
            $table->string('req_user_no', 10);
            $table->string('res_user_no', 10)->nullable();
            $table->date('req_dt');
            $table->date('res_dt')->nullable();
            $table->string('mov_status', 10);
            $table->text('req_comment')->nullable();
            $table->text('res_comment')->nullable();
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
        Schema::dropIfExists('equipment_move');
    }
}
