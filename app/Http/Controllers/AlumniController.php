<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::all(); // Mengambil semua data alumni
        return view('alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('alumni.create');
    }

    public function store(Request $request)
    {
        Alumni::create($request->all());
        return redirect()->route('alumni.index');
    }

    public function edit(Alumni $alumni)
    {
        return view('alumni.edit', compact('alumni'));
    }

    public function update(Request $request, Alumni $alumni)
    {
        $alumni->update($request->all());
        return redirect()->route('alumni.index');
    }

    public function destroy(Alumni $alumni)
    {
        $alumni->delete();
        return redirect()->route('alumni.index');
    }
}
