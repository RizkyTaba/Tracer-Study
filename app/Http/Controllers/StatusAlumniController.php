<?php

namespace App\Http\Controllers;

use App\Models\StatusAlumni;
use Illuminate\Http\Request;

class StatusAlumniController extends Controller
{
    /**
     * Tampilkan daftar status alumni.
     */
    public function index()
    {
        $statusAlumni = StatusAlumni::all();
        return view('status_alumni.index', compact('statusAlumni'));
    }

    /**
     * Tampilkan form untuk menambahkan status alumni baru.
     */
    public function create()
    {
        return view('status_alumni.create');
    }

    /**
     * Simpan data status alumni baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:25',
        ]);

        StatusAlumni::create($request->all());
        return redirect()->route('status_alumni.index')->with('success', 'Status alumni berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit untuk status alumni tertentu.
     */
    public function edit($id)
    {
        $statusAlumni = StatusAlumni::findOrFail($id);
        return view('status_alumni.edit', compact('statusAlumni'));
    }

    /**
     * Perbarui data status alumni.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:25',
        ]);

        $statusAlumni = StatusAlumni::findOrFail($id);
        $statusAlumni->update($request->all());
        return redirect()->route('status_alumni.index')->with('success', 'Status alumni berhasil diperbarui.');
    }

    /**
     * Hapus data status alumni.
     */
    public function destroy($id)
    {
        $statusAlumni = StatusAlumni::findOrFail($id);
        $statusAlumni->delete();
        return redirect()->route('status_alumni.index')->with('success', 'Status alumni berhasil dihapus.');
    }
}
