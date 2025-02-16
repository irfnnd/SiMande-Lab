<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\PermintaanPengujian;
use App\Models\SertifikatPengujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        // Ambil pelanggan berdasarkan user_id
        $pelanggan = Pelanggan::where('user_id', $userId)->first();

        if ($pelanggan) {
            // Ambil semua permintaan_id yang dimiliki oleh pelanggan tersebut
            $permintaanIds = PermintaanPengujian::where('pelanggan_id', $pelanggan->id)
                ->pluck('id'); // Mengambil semua ID permintaan yang terkait

            // Ambil semua sertifikat yang memiliki permintaan_id dalam daftar $permintaanIds
            $data = SertifikatPengujian::whereIn('permintaan_id', $permintaanIds)->get();

            // Kirim data ke view
            return view('user.sertifikat', compact('data'));
        }
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
        //
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
