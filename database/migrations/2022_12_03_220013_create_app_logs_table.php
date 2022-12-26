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
        Schema::create('app_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('otp');
            $table->time('waktu_otp');
            $table->date('tanggal_otp');
            $table->time('waktu_verify')->nullable();
            $table->date('tanggal_verify')->nullable();
            $table->enum('status',[
                'Verify terpenuhi',
                'Verify tidak terpenuhi'
            ])->nullable();
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
        Schema::dropIfExists('app_logs');
    }
};
