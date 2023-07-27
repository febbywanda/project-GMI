<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghapusanasetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghapusanaset', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_usulan');
            $table->string('ket_penghapusan');
            $table->integer('hasil_approval');
            $table->dateTime('tgl_pemeliharaan');
            $table->date('tgl_approval');
            $table->string('status_usulan');
            $table->text('slug');
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
        Schema::dropIfExists('penghapusanaset');
    }
}
