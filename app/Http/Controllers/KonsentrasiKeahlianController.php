<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KonsentrasiKeahlian;
use App\Models\ProgramKeahlian;
use Illuminate\Support\Facades\DB;

class KonsentrasiKeahlianController extends Controller
{
    public function index()
    {
        $data = KonsentrasiKeahlian::with('programKeahlian')->get();
        return view('konsentrasi_keahlian.index', compact('data'));
    }

    public function create()
    {
        $programKeahlian = ProgramKeahlian::all();
        return view('konsentrasi_keahlian.create', compact('programKeahlian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_program_keahlian' => 'required|exists:tbl_program_keahlian,id_program_keahlian',
            'kode_konsentrasi_keahlian' => 'required|string|max:10',
            'konsentrasi_keahlian' => 'required|string|max:100',
        ]);

        KonsentrasiKeahlian::create($request->all());
        return redirect()->route('konsentrasi_keahlian.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $konsentrasiKeahlian = KonsentrasiKeahlian::findOrFail($id);
        $programKeahlian = ProgramKeahlian::all();
        return view('konsentrasi_keahlian.edit', compact('konsentrasiKeahlian', 'programKeahlian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_program_keahlian' => 'required|exists:tbl_program_keahlian,id_program_keahlian',
            'kode_konsentrasi_keahlian' => 'required|string|max:10',
            'konsentrasi_keahlian' => 'required|string|max:100',
        ]);

        $konsentrasiKeahlian = KonsentrasiKeahlian::findOrFail($id);
        $konsentrasiKeahlian->update($request->all());
        return redirect()->route('konsentrasi_keahlian.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $konsentrasiKeahlian = KonsentrasiKeahlian::findOrFail($id);
        
        // Cek apakah ada alumni yang menggunakan KonsentrasiKeahlian ini
        if ($konsentrasiKeahlian->alumni()->count() > 0) {
            return redirect()->route('konsentrasi_keahlian.index')->with('error', 'Data Konsentrasi Keahlian tidak dapat dihapus karena masih digunakan oleh alumni.');
        }

        $konsentrasiKeahlian->delete();

        DB::statement('ALTER TABLE tbl_bidang_keahlian AUTO_INCREMENT = 1');

        return redirect()->route('konsentrasi_keahlian.index')->with('success', 'Data berhasil dihapus.');
    }
}
