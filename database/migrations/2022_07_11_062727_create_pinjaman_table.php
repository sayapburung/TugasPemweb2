<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_anggota')->unsigned();
            $table->foreign('id_anggota')->references('id')->on('anggota')->onUpdate('cascade')->onDelete('cascade');
              $table->string('tanggal');
              $table->string('jumlah');
               $table->string('lama_bulan');
                $table->string('bunga');
                 $table->string('total');
                 $table->string('angsuran');
                   $table->string('sisa_angsuran');
            
          
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
        Schema::dropIfExists('pinjaman');
    }
}
