<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\Alumni;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimoni = Testimoni::with('alumni')->get();
        return view('testimoni.index', compact('testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumni = Alumni::all();
        return view('testimoni.create', compact('alumni'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|integer',
            'testimoni' => 'required|longText',
            'tgl_testimoni' => 'required|date',
        ]);

        Testimoni::create($request->all());

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $alumni = Alumni::all();
        return view('testimoni.edit', compact('testimoni', 'alumni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_alumni' => 'required|integer',
            'testimoni' => 'required|longText',
            'tgl_testimoni' => 'required|date',
        ]);

        $testimoni = Testimoni::findOrFail($id);
        $testimoni->update($request->all());

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}