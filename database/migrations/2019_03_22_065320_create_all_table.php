<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level');
        });
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('nama');
            $table->string('kontak');
            $table->string('daerah_id');
            $table->string('status')->default("0");
            $table->string('level');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('daerahs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->string('nama_daerah');
            $table->string('jenis_daerah');
            $table->string('kepala_daerah');
            $table->string('nip')->nullable();
        });
        Schema::create('pelayanans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pelayanan');
            $table->string('jenis_pelayanan');
            $table->longText('keterangan')->nullable();
            $table->string('slug');
        });
        Schema::create('sublayanans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subpelayanan');
            $table->string('jenis_pelayanan');
            $table->text('keterangan')->nullable();
            $table->string('slug');
            $table->foreign('id_pelayanan')->references('id')->on('pelayanans');
            $table->integer('id_pelayanan')->unsigned();
        });

        Schema::create('pemohons', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nama');
            $table->string('nik',16)->unique();
            $table->string('telepon');
            $table->string('pekerjaan');
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('jalan')->nullable();
            $table->Integer('daerah_id')->unsigned();
            $table->foreign('daerah_id')->references('id')->on('daerahs');
            $table->Integer('pelayanan_id')->unsigned();
            $table->foreign('pelayanan_id')->references('id')->on('pelayanans');
            $table->timestamps();
        });
        Schema::create('izin-reklame',function(Blueprint $table){
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('jenis_reklame');
            $table->Integer('banyak')->unsigned();
            $table->string('pesan_produk');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->string('tempat_reklame');
            $table->string('scan_ktp');
            $table->string('scan_npwp');
            $table->string('contoh_reklame');
            $table->string('scan_persetujuan');
            $table->string('scan_izin_lama')->nullable();
            $table->string('scan_pengantar');
            $table->string('pesan')->nullable();
            $table->string('status')->default('Belum');
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
        Schema::drop('levels');
        Schema::drop('admins');
        Schema::drop('daerahs');
        Schema::drop('pelayanans');
        Schema::drop('sublayanans');
        Schema::drop('berkas');
        Schema::drop('pemohons');
    }
}
