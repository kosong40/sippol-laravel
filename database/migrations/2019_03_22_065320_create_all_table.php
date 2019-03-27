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
        Schema::create('berkas',function(Blueprint $table){
            $table->Increments('id');
            $table->Integer('pelayanan_id')->unsigned();
            $table->foreign('pelayanan_id')->references('id')->on('pelayanans');
            $table->timestamps();
        });
        Schema::create('pemohons', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('telepon');
            $table->string('rt');
            $table->string('rw');
            $table->string('desa');
            $table->string('jalan')->nullable();
            $table->Integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->Integer('berkas_id')->unsigned();
            $table->foreign('berkas_id')->references('id')->on('berkas');
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
