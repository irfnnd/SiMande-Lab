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
        $pelanggan = Pelanggan::where('user_id', $userId)->first();

        $idPelanggan = $pelanggan->id;
        $permintaan = PermintaanPengujian::where('pelanggan_id', $idPelanggan)->first();
        $permintaan_id = $permintaan->id;
        $data = SertifikatPengujian::where('permintaan_id', $permintaan_id)->get();
        return view('user.sertifikat',compact('data'));
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
