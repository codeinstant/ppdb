<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('nik')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('kabupaten', 50)->nullable();
            $table->string('provinsi', 50)->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->bigInteger('no_telp')->nullable();
            $table->unsignedBigInteger('sekolah_id')->nullable();
            $table->foreign('sekolah_id')->references('id')->on('sekolah');
            $table->string('ipa', 10)->nullable();
            $table->string('bhs_indo', 10)->nullable();
            $table->string('bhs_inggris', 10)->nullable();
            $table->string('matematika', 10)->nullable();
            $table->string('foto', 100)->nullable();
            $table->string('ijasah', 100)->nullable();
            $table->string('nama_ayah', 50)->nullable();
            $table->string('nama_ibu', 50)->nullable();
            $table->text('alamat_ortu', 50)->nullable();
            $table->bigInteger('no_hp_ortu')->nullable();
            $table->string('pekerjaan_ayah', 50)->nullable();
            $table->string('pekerjaan_ibu', 50)->nullable();
            $table->string('penghasilan_ortu', 50)->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('pendaftar');
    }
}
