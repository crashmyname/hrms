<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('eid');
            $table->string('nik');
            $table->string('name');
            $table->string('departement');
            $table->string('section');
            $table->date('hire_date');
            $table->date('birth_date');
            $table->string('golongan');
            $table->string('religion');
            $table->string('education');
            $table->string('blood_type');
            $table->string('email');
            $table->string('emp_status');
            $table->integer('salary');
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
        Schema::dropIfExists('employees');
    }
};
