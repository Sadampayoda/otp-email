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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->enum('hari',[
                'senen',
                'selasa',
                'rabu',
                'kamis',
                'jumat'
            ]);
            $table->enum('waktu',[
                '07:30:00 - 09:00:00',
                '09:30:00 - 12:00:00',
                '13:00:00 - 15:30:00'
            ]);
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
        Schema::dropIfExists('jadwals');
    }
};
