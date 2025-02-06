<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunLulus;

class TahunLulusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunLulus = TahunLulus::all();
        return view('tahun_lulus.index', compact('tahunLulus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tahun_lulus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun_lulus' => 'required|string|max:10',
            'keterangan' => 'required|string|max:50',
        ]);

        TahunLulus::create($request->all());

        return redirect()->route('tahun_lulus.index')
                         ->with('success', 'Tahun Lulus created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TahunLulus $tahunLulus)
    {
        return view('tahun_lulus.show', compact('tahunLulus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TahunLulus $tahunLulus)
    {
        return view('tahun_lulus.edit', compact('tahunLulus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TahunLulus $tahunLulus)
    {
        $request->validate([
            'tahun_lulus' => 'required|string|max:10',
            'keterangan' => 'required|string|max:50',
        ]);

        $tahunLulus->update($request->all());

        return redirect()->route('tahun_lulus.index')
                         ->with('success', 'Tahun Lulus updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tahunLulus = TahunLulus::findOrFail($id);
        
        // Cek apakah ada alumni yang menggunakan TahunLulus ini
        if ($tahunLulus->alumni()->count() > 0) {
            return redirect()->route('tahun_lulus.index')->with('error', 'Data Tahun Lulus tidak dapat dihapus karena masih digunakan oleh alumni.');
        }

        $tahunLulus->delete();

        return redirect()->route('tahun_lulus.index')->with('success', 'Tahun Lulus berhasil dihapus.');
    }
}
