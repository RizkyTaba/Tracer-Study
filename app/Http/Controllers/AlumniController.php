<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use App\Models\TahunLulus;
use App\Models\KonsentrasiKeahlian;
use App\Models\StatusAlumni;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::all();
        return view('alumni.index', compact('alumni'));
    }

    public function create()
    {
        $tahunLulus = TahunLulus::all();
        $konsentrasiKeahlian = KonsentrasiKeahlian::all();
        $statusAlumni = StatusAlumni::all();
        return view('alumni.create', compact('tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tahun_lulus' => 'required|integer',
            'id_konsentrasi_keahlian' => 'required|integer',
            'id_status_alumni' => 'required|integer',
            'nisn' => 'required|max:20',
            'nik' => 'required|max:20',
            'nama_depan' => 'required|max:50',
            'nama_belakang' => 'nullable|max:50',
            'jenis_kelamin' => 'required|max:10',
            'tempat_lahir' => 'required|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|max:50',
            'no_hp' => 'required|max:15',
            'email' => 'required|email|max:50',
            'password' => 'required',
            'akun_fb' => 'nullable|max:50',
            'akun_ig' => 'nullable|max:50',
            'akun_tiktok' => 'nullable|max:50',
            'status_login' => 'required|in:0,1',
        ]);

        Alumni::create($request->all());
        return redirect()->route('alumni.index')->with('success', 'Data Alumni berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);
        $tahunLulus = TahunLulus::all();
        $konsentrasiKeahlian = KonsentrasiKeahlian::all();
        $statusAlumni = StatusAlumni::all();
        return view('alumni.edit', compact('alumni', 'tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_tahun_lulus' => 'required|integer',
            'id_konsentrasi_keahlian' => 'required|integer',
            'id_status_alumni' => 'required|integer',
            'nisn' => 'required|max:20',
            'nik' => 'required|max:20',
            'nama_depan' => 'required|max:50',
            'nama_belakang' => 'nullable|max:50',
            'jenis_kelamin' => 'required|max:10',
            'tempat_lahir' => 'required|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|max:50',
            'no_hp' => 'required|max:15',
            'email' => 'required|email|max:50',
            'password' => 'nullable|min:8', // Password is nullable and must be at least 8 characters if provided
            'akun_fb' => 'nullable|max:50',
            'akun_ig' => 'nullable|max:50',
            'akun_tiktok' => 'nullable|max:50',
            'status_login' => 'required|in:0,1',
        ]);

        $alumni = Alumni::findOrFail($id);

        // Update alumni data
        $alumni->id_tahun_lulus = $request->id_tahun_lulus;
        $alumni->id_konsentrasi_keahlian = $request->id_konsentrasi_keahlian;
        $alumni->id_status_alumni = $request->id_status_alumni;
        $alumni->nisn = $request->nisn;
        $alumni->nik = $request->nik;
        $alumni->nama_depan = $request->nama_depan;
        $alumni->nama_belakang = $request->nama_belakang;
        $alumni->jenis_kelamin = $request->jenis_kelamin;
        $alumni->tempat_lahir = $request->tempat_lahir;
        $alumni->tgl_lahir = $request->tgl_lahir;
        $alumni->alamat = $request->alamat;
        $alumni->no_hp = $request->no_hp;
        $alumni->email = $request->email;
        $alumni->akun_fb = $request->akun_fb;
        $alumni->akun_ig = $request->akun_ig;
        $alumni->akun_tiktok = $request->akun_tiktok;
        $alumni->status_login = $request->status_login;

        // Update password if provided
        if ($request->filled('password')) {
            $alumni->password = bcrypt($request->password);
        }

        $alumni->save();

        return redirect()->route('alumni.index')->with('success', 'Data Alumni berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->delete();

        return redirect()->route('alumni.index')->with('success', 'Data Alumni berhasil dihapus.');
    }

    public function show($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('alumni.show', compact('alumni'));
    }
    
}
