<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->integer('nim');
            $table->string('divisi');
            $table->string('sub_divisi');
            $table->string('fakultas');
            $table->string('jurusan');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('asal');
            $table->string('no_hp');
            $table->string('agama');
            $table->string('foto')->nullable();
            $table->string('krs')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->boolean('validation_status')->default(false);
            $table->boolean('status_aktif')->default(true);
            $table->string('zona')->nullable();
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
        Schema::dropIfExists('profiles');
    }
};
