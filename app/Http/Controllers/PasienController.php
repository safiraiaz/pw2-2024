<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasien = Pasien::get();
        return view('pasien.index', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // cek validasi
        $request->validate([
                'kode' => 'required|string',
                'nama' => 'required|string',
                'tmp_lahir' => 'required|string',
                'tgl_lahir' => 'required|date',
                'gender' => 'required|string',
                'email' => 'required|string',
                'alamat' => 'required|string',
            ]);
            // kirim ke database
            Pasien::create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'gender' => $request->gender,
                'email' => $request->email,
                'alamat' => $request->alamat,
            ]);
            // direct ke index
            return redirect()->route('pasien.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        // Pass the Pasien instance to the view
        return view('pasien.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        // hapus data
        $pasien->delete();
        // redirect ke index
        return redirect()->route('pasien.index');
    }
}