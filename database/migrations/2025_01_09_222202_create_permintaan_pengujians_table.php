<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permintaan_pengujians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->constrained('pelanggans')->onDelete('cascade');
            $table->enum('pengambilan_sampel', ['Pelanggan', 'Petugas']);
            $table->string('parameter')->nullable();
            $table->integer('jumlah_titik')->nullable();
            $table->decimal('total_biaya', 10, 2)->nullable(); // Total biaya
            $table->enum('status', ['Pending', 'Disetujui', 'Ditolak', 'Menunggu Pembayaran','Bukti Pembayaran Tidak Valid','Bukti Pembayaran Valid', 'Menunggu Pengambilan Sampel','Proses Pengujian', 'Selesai'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_pengujians');
    }
};
