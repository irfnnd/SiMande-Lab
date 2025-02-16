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
            $table->string('status')->default('Proses Pengajuan');
            $table->json('status_history')->nullable();
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
