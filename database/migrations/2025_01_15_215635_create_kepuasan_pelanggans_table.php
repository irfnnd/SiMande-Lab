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
        Schema::create('kepuasan_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->constrained('pelanggans')->onDelete('cascade');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->comment('Jenis kelamin pelanggan');
            $table->string('umur')->comment('Umur pelanggan');
            $table->string('pendidikan')->comment('Pendidikan terakhir pelanggan');
            $table->string('pekerjaan')->comment('Pendidikan terakhir pelanggan');
            $table->unsignedTinyInteger('rating')->comment('Rating kepuasan 1-5');  // Rating antara 1 sampai 5
            $table->text('feedback')->nullable(); // Umpan balik atau komentar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepuasan_pelanggans');
    }
};
