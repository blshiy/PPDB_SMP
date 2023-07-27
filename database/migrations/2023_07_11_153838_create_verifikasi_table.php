<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifikasi', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');

            $table->string('nomor_pendaftaran')->unique();
            $table->date('tanggal_daftar')->nullable();
            $table->text('jawaban_pertanyaan_1')->nullable();
            $table->text('jawaban_pertanyaan_2')->nullable();
            $table->text('jawaban_pertanyaan_3')->nullable();
            $table->text('jawaban_pertanyaan_4')->nullable();
            $table->text('jawaban_pertanyaan_5')->nullable();
            $table->string('status')->nullable();
            $table->string('pengumuman')->nullable();
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
        Schema::dropIfExists('verifikasi');
    }
}
