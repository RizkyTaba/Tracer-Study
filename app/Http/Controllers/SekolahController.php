<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::all();
        return view('sekolah.index', compact('sekolah'));
    }

    public function show($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        return view('sekolah.detail', compact('sekolah'));
    }
}
