<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('foto')->nullable();
            $table->string('jk')->nullable();
            $table->string('nik')->nullable();
            $table->string('nisn')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('no_akta_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('kebutuhan_khusus')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kode_pos')->nullable();
            $table->text('alamat')->nullable();
            $table->string('tempat_tinggal')->nullable();
            $table->string('transportasi')->nullable();
            $table->string('kip')->nullable();
            $table->string('menerima_kip')->nullable();
            $table->string('tolak_kip')->nullable();
            $table->string('tb')->nullable();
            $table->string('bb')->nullable();
            $table->string('saudara')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('tahun_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('kebutuhan_ayah')->nullable();

            $table->string('nama_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('tahun_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->string('kebutuhan_ibu')->nullable();

            $table->string('nama_wali')->nullable();
            $table->string('nik_wali')->nullable();
            $table->string('tahun_wali')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('penghasilan_wali')->nullable();
            $table->string('kebutuhan_wali')->nullable();

            $table->string('kontak')->nullable();
            $table->string('skhu')->nullable();
            $table->string('akta_lahir')->nullable();
            $table->string('kk')->nullable();
            $table->string('ktp')->nullable();

            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('siswa');
    }
}
