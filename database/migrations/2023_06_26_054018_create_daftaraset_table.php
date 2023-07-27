<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarasetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftaraset', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_merk')->constrained("merk")->onDelete('cascade');
            $table->foreignId('id_ruangan')->constrained("ruangan")->onDelete('cascade');
            $table->foreignId('id_barang')->constrained("barang")->onDelete('cascade');
            $table->foreignId('id_golongan')->constrained("golongan")->onDelete('cascade');
            $table->foreignId('id_status')->constrained("status")->onDelete('cascade');
            $table->string('nama_aset');
            $table->string('kode_aset');
            $table->integer('harga_pembelian');
            $table->date('tgl_pembelian');
            $table->integer('masa_manfaat');
            $table->integer('nilai_redusi');
            $table->string('status_aset');
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
        Schema::dropIfExists('daftaraset');
    }
}
