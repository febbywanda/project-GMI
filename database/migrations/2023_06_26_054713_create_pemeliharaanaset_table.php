<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeliharaanasetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeliharaanaset', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_daftaraset')->constrained("daftaraset")->onDelete('cascade');
            $table->string('hasil_pemeliharaan');
            $table->integer('biaya_pemeliharaan');
            $table->date('tgl_penjadwalan');
            $table->dateTime('tgl_pemeliharaan');
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
        Schema::dropIfExists('pemeliharaanaset');
    }
}
