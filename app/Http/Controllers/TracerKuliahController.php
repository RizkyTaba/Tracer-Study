<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TracerKuliah;
use App\Models\Alumni;
use App\Models\StatusAlumni;
class TracerKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracerKuliah = TracerKuliah::with('alumni')->get();
        return view('tracer_kuliah.index', compact('tracerKuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumni = Alumni::all();
        return view('tracer_kuliah.create', compact('alumni'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|integer',
            'tracer_kuliah_kampus' => 'required|string|max:45',
            'tracer_kuliah_status' => 'required|string|max:45',
            'tracer_kuliah_jenjang' => 'required|string|max:45',
            'tracer_kuliah_jurusan' => 'required|string|max:45',
            'tracer_kuliah_linier' => 'required|string|max:45',
            'tracer_kuliah_alamat' => 'required|string|max:45',
        ]);

        TracerKuliah::create($request->all());

        $alumni = Alumni::findOrFail($request->id_alumni);
        
        // Cek apakah status alumni sudah ada
        $statusAlumni = StatusAlumni::firstOrNew(['id_status_alumni' => 2]);
        $statusAlumni->status = 'Kuliah'; // Menyimpan status sebagai 'Bekerja'
        $statusAlumni->save();
        
        // Jika Anda ingin mengaitkan status dengan alumni, Anda bisa menambahkan logika di sini

        $alumni->id_status_alumni = $statusAlumni->id_status_alumni;
        $alumni->save();

        return redirect()->route('tracer_kuliah.index')->with('success', 'Tracer Kuliah berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tracerKuliah = TracerKuliah::findOrFail($id);
        $alumni = Alumni::all();
        return view('tracer_kuliah.edit', compact('tracerKuliah', 'alumni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_alumni' => 'required|integer',
            'tracer_kuliah_kampus' => 'required|string|max:45',
            'tracer_kuliah_status' => 'required|string|max:45',
            'tracer_kuliah_jenjang' => 'required|string|max:45',
            'tracer_kuliah_jurusan' => 'required|string|max:45',
            'tracer_kuliah_linier' => 'required|string|max:45',
            'tracer_kuliah_alamat' => 'required|string|max:45',
        ]);

        $tracerKuliah = TracerKuliah::findOrFail($id);
        $tracerKuliah->update($request->all());

        return redirect()->route('tracer_kuliah.index')->with('success', 'Tracer Kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tracerKuliah = TracerKuliah::findOrFail($id);
        $tracerKuliah->delete();

        return redirect()->route('tracer_kuliah.index')->with('success', 'Tracer Kuliah berhasil dihapus.');
    }
}