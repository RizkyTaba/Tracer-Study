<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TracerKerja;
use App\Models\Alumni;

class TracerKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracerKerja = TracerKerja::with('alumni')->get();
        return view('tracer_kerja.index', compact('tracerKerja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumni = Alumni::all();
        return view('tracer_kerja.create', compact('alumni'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|integer',
            'tracer_kerja_pekerjaan' => 'required|string|max:50',
            'tracer_kerja_nama' => 'required|string|max:50',
            'tracer_kerja_jabatan' => 'required|string|max:50',
            'tracer_kerja_status' => 'required|string|max:50',
            'tracer_kerja_lokasi' => 'required|string|max:50',
            'tracer_kerja_alamat' => 'required|string|max:50',
            'tracer_kerja_tgl_mulai' => 'required|date',
            'tracer_kerja_gaji' => 'required|string|max:50',
        ]);

        TracerKerja::create($request->all());

        return redirect()->route('tracer_kerja.index')->with('success', 'Tracer Kerja berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tracerKerja = TracerKerja::findOrFail($id);
        $alumni = Alumni::all();
        return view('tracer_kerja.edit', compact('tracerKerja', 'alumni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_alumni' => 'required|integer',
            'tracer_kerja_pekerjaan' => 'required|string|max:50',
            'tracer_kerja_nama' => 'required|string|max:50',
            'tracer_kerja_jabatan' => 'required|string|max:50',
            'tracer_kerja_status' => 'required|string|max:50',
            'tracer_kerja_lokasi' => 'required|string|max:50',
            'tracer_kerja_alamat' => 'required|string|max:50',
            'tracer_kerja_tgl_mulai' => 'required|date',
            'tracer_kerja_gaji' => 'required|string|max:50',
        ]);

        $tracerKerja = TracerKerja::findOrFail($id);
        $tracerKerja->update($request->all());

        return redirect()->route('tracer_kerja.index')->with('success', 'Tracer Kerja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tracerKerja = TracerKerja::findOrFail($id);
        $tracerKerja->delete();

        return redirect()->route('tracer_kerja.index')->with('success', 'Tracer Kerja berhasil dihapus.');
    }
}