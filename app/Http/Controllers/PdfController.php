<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function tagihanPDF($id)
    {
        // Ambil data tagihan berdasarkan ID
        $tagihan = Pembayaran::findOrFail($id);

        $tanggal = $tagihan->permintaan->created_at->format('Y-m-d');

        // Format Nomor Invoice: INV-YYYYMMDD-ID
        $nomorInvoice = "INV-{$tanggal}-" . str_pad($id, 3, '0', STR_PAD_LEFT);

        // Data untuk dimasukkan ke dalam PDF
        $data = [
            'nomor_invoice' => $nomorInvoice,
            'nama_pelanggan' => $tagihan->pelanggan->nama_pelanggan,
            'nama_perusahaan' => $tagihan->permintaan->nama_perusahaan ?? 'Tidak ada nama perusahaan',
            'parameter' => $tagihan->permintaan->parameter,
            'jumlah_titik' => $tagihan->permintaan->jumlah_titik,
            'id' => $tagihan->id,
            'total_biaya' => $tagihan->permintaan->total_biaya,
            'status' => $tagihan->status,
            'tanggal' => now()->format('d-m-Y'),
        ];

        // Load view untuk PDF
        $pdf = Pdf::loadView('pdf.tagihan', $data);

        // Nama file yang akan diunduh
        $filename = 'tagihan_' . $tagihan->id . '.pdf';

        // Kirim file PDF untuk diunduh
        return $pdf->stream($filename);
    }
}
