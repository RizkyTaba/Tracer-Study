<?php

namespace App\Http\Controllers;

use App\Models\BidangKeahlian;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BidangKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bidangKeahlians = BidangKeahlian::all();
        return view('bidang_keahlian.index', compact('bidangKeahlians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bidang_keahlian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_bidang_keahlian' => 'required|unique:tbl_bidang_keahlian',
            'bidang_keahlian' => 'required',
        ]);

        BidangKeahlian::create([
            'kode_bidang_keahlian' => $request->kode_bidang_keahlian,
            'bidang_keahlian' => $request->bidang_keahlian,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('bidang_keahlian.index')->with('success', 'Bidang keahlian created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BidangKeahlian $bidangKeahlian)
    {
        return view('bidang_keahlian.show', compact('bidangKeahlian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BidangKeahlian $bidangKeahlian)
    {
        return view('bidang_keahlian.edit', compact('bidangKeahlian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_bidang_keahlian' => 'required|unique:tbl_bidang_keahlian,kode_bidang_keahlian,' . $id . ',id_bidang_keahlian',
            'bidang_keahlian' => 'required',
        ]);

        $bidangKeahlian = BidangKeahlian::find($id);
        $bidangKeahlian->kode_bidang_keahlian = $request->kode_bidang_keahlian;
        $bidangKeahlian->bidang_keahlian = $request->bidang_keahlian;
        $bidangKeahlian->save();

        return redirect()->route('bidang_keahlian.index')->with('success', 'Bidang Keahlian updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BidangKeahlian $bidangKeahlian)
    {
        // Cek apakah ada ProgramKeahlian yang menggunakan BidangKeahlian ini
        if ($bidangKeahlian->programKeahlian()->count() > 0) {
            return redirect()->route('bidang_keahlian.index')->with('error', 'Data Bidang Keahlian tidak dapat dihapus karena masih digunakan oleh Program Keahlian.');
        }

        $bidangKeahlian->delete();

        // Reset auto-increment
        DB::statement('ALTER TABLE tbl_bidang_keahlian AUTO_INCREMENT = 1');

        return redirect()->route('bidang_keahlian.index')->with('success', 'Bidang Keahlian deleted successfully.');
    }
}