<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProgramKeahlian;
use App\Models\BidangKeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramKeahlianController extends Controller
{
    public function index()
    {
        $programKeahlians = ProgramKeahlian::all();
        return view('program_keahlian.index', compact('programKeahlians'));
    }

    public function create()
    {
        $bidangKeahlians = BidangKeahlian::all();
   
        return view('program_keahlian.create', compact('bidangKeahlians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_program_keahlian' => 'required|unique:tbl_program_keahlian',
            'program_keahlian' => 'required',
            'id_bidang_keahlian' => 'required',
        ]);

        ProgramKeahlian::create($request->all());

        return redirect()->route('program_keahlian.index')->with('success', 'Program keahlian created successfully.');
    }

    public function edit(ProgramKeahlian $programKeahlian)
    {
        $bidangKeahlians = BidangKeahlian::all();
        return view('program_keahlian.edit', compact('programKeahlian', 'bidangKeahlians'));
    }

    public function update(Request $request, ProgramKeahlian $programKeahlian)
    {
        // dd($request->only(['kode_program_keahlian', 'program_keahlian','id_bidang_keahlian' ]));
        $request->validate([
            'kode_program_keahlian' => 'required|unique:tbl_program_keahlian,kode_program_keahlian,' . $programKeahlian->id_program_keahlian. ',id_program_keahlian',
            'program_keahlian' => 'required',
            'id_bidang_keahlian' => 'required',
        ]);
// dd
        $programKeahlian->update($request->only(['kode_program_keahlian', 'program_keahlian','id_bidang_keahlian' ]));


        return redirect()->route('program_keahlian.index')->with('success', 'Program keahlian updated successfully.');
    }

    public function show(ProgramKeahlian $programKeahlian)
    {
        return view('program_keahlian.show', compact('programKeahlian'));
    }

    public function destroy(ProgramKeahlian $programKeahlian)
    {
        $programKeahlian->delete();

        DB::statement('ALTER TABLE tbl_bidang_keahlian AUTO_INCREMENT = 1');

        return redirect()->route('program_keahlian.index')
                         ->with('success', 'Program Keahlian deleted successfully');
    }

    // ... other methods (show, destroy)
}