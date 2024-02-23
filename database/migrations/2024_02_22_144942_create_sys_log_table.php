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
        Schema::create('sys_log', function (Blueprint $table) {
            $table->id('id_log');
            $table->string('name');
            $table->string('activity',15);
            $table->string('table_name',50);
            $table->string('recordId');
            $table->string('old_data',5000);
            $table->string('new_data',5000);
            $table->string('ip_device',150);
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
        Schema::dropIfExists('sys_log');
    }
};
