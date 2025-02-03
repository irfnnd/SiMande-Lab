<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $pelanggan = Pelanggan::where('user_id', $userId)->first();

        $idPelanggan = $pelanggan->id;
        $data = Pembayaran::where('pelanggan_id', $idPelanggan)
        ->orderBy('id', 'desc') // Mengurutkan berdasarkan ID terbaru
        ->get();


        return view('user.pembayaran', compact( 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    public function uploadBukti(Request $request)
    {
        // Validasi input
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi file gambar
        ]);

        // Simpan gambar ke direktori storage/app/public/bukti_pembayaran
        $path = $request->file('image')->store('bukti-pembayaran', 'public');

        // Update database dengan path gambar
        $pembayaran = Pembayaran::findOrFail($request->pembayaran_id);
        $pembayaran->bukti_pembayaran = $path;
        $pembayaran->save();
        session()->flash('success', 'Bukti Pembayaran berhasil diupload.');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
