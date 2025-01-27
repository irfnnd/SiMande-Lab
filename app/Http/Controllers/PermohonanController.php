<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use App\Models\Pembayaran;
use App\Models\PermintaanPengujian;
use App\Models\SampelPengujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggan;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $pelanggan = Pelanggan::where('user_id', $userId)->first();

        $parameters = Parameter::all();
        $idPelanggan = $pelanggan->id;
        $permohonan = PermintaanPengujian::where('pelanggan_id', $idPelanggan)->get();

        $idPelanggan = $pelanggan->id;

        // Generate kode sampel
        $kodeSampel = SampelPengujian::generateKode();
        return view('user.permohonan-uji', compact('idPelanggan', 'kodeSampel', 'parameters', 'permohonan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Buat permintaan pengujian
        $permintaanPengujian = PermintaanPengujian::create([
            'pelanggan_id' => $request->id_pelanggan,
            'pengambilan_sampel' => $request->pengambilan_sampel,
            'parameter' => $request->parameter,
            'jumlah_titik' => $request->jumlah_titik,
            'total_biaya' => $request->jumlah_biaya,
        ]);

        // Ambil ID dari permintaan pengujian yang baru dibuat
        $idPermintaan = $permintaanPengujian->id;

        // Buat sampel pengujian
        SampelPengujian::create([
            'permintaan_id' => $idPermintaan,
            'kode_sampel' => $request->kode_sampel,
            'tanggal_pengambilan' => $request->tanggal_pengambilan,
            'waktu_pengambilan' => $request->waktu_pengambilan,
        ]);

        Pembayaran::create([
            'permintaan_id' => $idPermintaan,
            'pelanggan_id' => $request->id_pelanggan,
        ]);

        // Redirect atau tampilkan pesan sukses
        session()->flash('success', 'Permohonan Pengujian berhasil dibuat.');
        return redirect()->back();

        // Redirect atau tampilkan pesan sukses
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permintaan = PermintaanPengujian::with('sampel')->findOrFail($id);
        return response()->json($permintaan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getParameter($id)
    {
        $parameter = Parameter::find($id);

        if ($parameter) {
            return response()->json([
                'kode_parameter' => $parameter->kode,
                'satuan' => $parameter->satuan,
                'wadah' => $parameter->wadah,
                'volume_sampel' => $parameter->volume_sampel,
                'metode_uji' => $parameter->metode_uji,
                'tarif' => $parameter->tarif,
                'parameter' => $parameter->parameter,
            ]);
        }

        return response()->json(['message' => 'Parameter not found'], 404);
    }

    public function updateStatus(Request $request, $id)
    {
        // $request->validate([
        //     'status' => 'required|string',
        // ]);

        $data = $request->status;

        $permintaan = PermintaanPengujian::findOrFail($id);

        // Ambil riwayat status sebelumnya
        $history = $permintaan->status_history ? json_decode($permintaan->status_history, true) : [];

        // Tambahkan status baru ke riwayat
        $history[] = [
            'status' => $permintaan->status, // Status sebelumnya
            'updated_at' => now()->toDateTimeString(), // Waktu perubahan
        ];

        // Update status baru dan riwayat
        $permintaan->update([
            'status' => $data,
            'status_history' => json_encode($history),
        ]);

        return response()->json(['message' => 'Status updated successfully']);
    }

    public function getStatusHistory($id)
    {
        $permintaan = PermintaanPengujian::findOrFail($id);

        // Decode riwayat status
        $history = $permintaan->status_history ? json_decode($permintaan->status_history, true) : [];

        return view('user.timeline', compact('permintaan', 'history'));
    }

}
