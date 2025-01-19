<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sampel_pengujians', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sampel')->unique();
            $table->foreignId('permintaan_id')->constrained('permintaan_pengujians')->onDelete('cascade');
            $table->foreignId('parameter_id')->nullable()->constrained('parameters')->onDelete('cascade');
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->date('tanggal_pengambilan')->nullable();
            $table->time('waktu_pengambilan')->nullable();
            $table->string('petugas_pengambilan')->nullable();
            $table->string('acuan_metode')->nullable();
            $table->string('teknik_pengambilan')->nullable();
            $table->string('wadah')->nullable();
            $table->string('volume_sampel')->nullable();
            $table->string('ph')->nullable();
            $table->string('dhl')->nullable();
            $table->string('suhu_air')->nullable();
            $table->string('do')->nullable();
            $table->string('warna')->nullable();
            $table->string('sanity')->nullable();
            $table->string('yds')->nullable();
            $table->string('cuaca')->nullable();
            $table->string('musim')->nullable();
            $table->string('bau')->nullable();
            $table->string('lab_minyak')->nullable();
            $table->string('suhu_udara')->nullable();
            $table->string('kuat_arus')->nullable();
            $table->string('debit_air')->nullable();
            $table->string('titik_koordinat')->nullable();
            $table->string('alasan_sampel_tidak_diambil')->nullable();
            $table->text('rincian_kondisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampel_pengujians');
    }
};