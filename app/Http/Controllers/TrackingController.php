<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\PermintaanPengujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $pelanggan = Pelanggan::where('user_id', $userId)->first();

        $idPelanggan = $pelanggan->id;
        $data = PermintaanPengujian::where('pelanggan_id', $idPelanggan)->get();
        return view('user.tracking', compact('data'));
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
    public function getStatusHistory($id)
    {
        $permintaan = PermintaanPengujian::findOrFail($id);

        // Decode riwayat status
        $history = $permintaan->status_history ? json_decode($permintaan->status_history, true) : [];

        // Format tanggal
        $formattedHistory = array_map(function ($item) {
            return [
                'status' => $item['status'],
                'updated_at' => \Carbon\Carbon::parse($item['updated_at'])->format('d M Y H:i'),
            ];
        }, $history);

        return response()->json([
            'permintaan' => $permintaan,
            'history' => $formattedHistory,
        ]);
    }

}
