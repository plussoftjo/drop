<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('needs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('PatientName');
            $table->string('PhoneNumber');
            $table->string('PatientFileNumber')->nullable();
            $table->string('HospitalName')->nullable();
            $table->string('location')->nullable();
            $table->string('BloodTypeRequest')->nullable();
            $table->string('NumberOfUnit')->nullable();
            $table->string('Note')->nullable();
            $table->integer('Done')->default(1);
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
        Schema::dropIfExists('needs');
    }
}
