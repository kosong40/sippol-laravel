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
            $table->string('kode',16)->unique();
            $table->string('nama');
            $table->string('nik',16);
            $table->string('telepon');
            $table->string('pekerjaan');
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('jalan')->nullable();
            $table->Integer('daerah_id')->unsigned();
            $table->foreign('daerah_id')->references('id')->on('daerahs');
            $table->Integer('pelayanan_id')->unsigned();
            $table->foreign('pelayanan_id')->references('id')->on('pelayanans');
            $table->Integer('sublayanan_id')->unsigned()->nullable();
            $table->foreign('sublayanan_id')->references('id')->on('sublayanans');
            $table->timestamps();
        });
        Schema::create('izin-reklame',function(Blueprint $table){
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
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
        Schema::create('izin-mendirikan-bangunan',function(BLueprint $table){
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('keperluan_bangunan');
            $table->string('konstruksi_bangunan');
            $table->float('luas_bangunan',8,2);
            $table->float('luas_tanah',8,2);
            $table->string('letak_bangunan');
            $table->string('tanah_milik');
            $table->string('scan_ktp');
            $table->string('scan_persetujuan_tetangga');
            $table->string('scan_fc_kepemilikan_tanah');
            $table->string('scan_fc_sppt_pbb_terakhir');
            $table->string('scan_gambar_rencana');
            $table->string('scan_pengantar');
            $table->string('pesan')->nullable();
            $table->string('status')->default('Belum');
            $table->timestamps();
        });
        Schema::create('izin-usaha-mikro-dan-kecil',function(Blueprint $table){
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('nama_usaha');
            $table->string('alamat_usaha');
            $table->string('kodepos');
            $table->string('sektor_usaha');
            $table->string('sarana');
            $table->string('modal');
            $table->string('npwp');
            $table->string('klasifikasi');
            $table->string('scan_ktp');
            $table->string('scan_kk');
            $table->string('scan_pengantar');
            $table->string('foto');
            $table->string('pesan')->nullable();
            $table->string('status')->default('Belum');
            $table->timestamps();
        });
        Schema::create('salon-kecantikan',function(Blueprint $table){
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('jenis');
            $table->string('nama_usaha');
            $table->string('alamat_usaha');
            $table->string('nama_usaha_baru')->nullable();
            $table->string('scan_ktp');
            $table->string('scan_pengantar');
            $table->string('pesan')->nullable();
            $table->string('status')->default('Belum');
            $table->timestamps();
        });
        Schema::create('gelanggang-ketangkasan',function(Blueprint $table){
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('nama_usaha');
            $table->string('alamat_usaha');
            $table->string('jumlah_monitor');
            $table->string('scan_ktp');
            $table->string('scan_pengantar');
            $table->string('scan_pernyataan_desa');
            $table->string('pesan')->nullable();
            $table->string('status')->default('Belum');
            $table->timestamps();
        });
        Schema::create('atraksi-wisata',function(Blueprint $table){
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('umur',3);
            $table->string('nama_usaha');
            $table->string('alamat_usaha');
            $table->string('jumlah_karyawan');
            $table->string('nilai_aset');
            $table->string('scan_ktp');
            $table->string('scan_pengantar');
            $table->string('scan_pernyataan_desa');
            $table->string('struktur_organisasi');
            $table->string('pesan')->nullable();
            $table->string('status')->default('Belum');
            $table->timestamps();
        });
        Schema::create('rumah-makan',function(Blueprint $table){
            $table->Increments('id');
            $table->Integer('id_pemohon')->unsigned();
            $table->foreign('id_pemohon')->references('id')->on('pemohons');
            $table->string('no_sk')->unique()->nullable();
            $table->string('jenis');
            $table->string('nama_usaha');
            $table->string('alamat_usaha');
            $table->string('nama_usaha_baru')->nullable();
            $table->string('scan_ktp');
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
        Schema::drop('izin-reklame');
        Schema::drop('izin-mendirikan-bangunan');
        Schema::drop('izin-usaha-mirko-dan-kecil');
        Schema::drop('salon-kecantikan');
        Schema::drop('gelanggang-ketangkasan');
        Schema::drop('atraksi-wisata');
        Schema::drop('rumah-makan');
    }
}
