<?php

namespace App\Http\Controllers;

use App\Models\KepuasanPelanggan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $pelanggan = Pelanggan::where('user_id', $userId)->first();

        $pelanggan_id = $pelanggan->id;
        return view('user.feedback', compact('pelanggan_id'));
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
        // Validasi data
        $validatedData = $request->validate([
            'pelanggan_id' => 'required',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'umur' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required|in:wiraswasta,PNS/TNI/POLRI,Pegawai Swasta,Lainnya',
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string|max:1000',
        ]);


        KepuasanPelanggan::create($validatedData);

        session()->flash('success', 'Feedback Anda berhasil dikirim. Terima kasih!');
        // Redirect dengan pesan sukses
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
