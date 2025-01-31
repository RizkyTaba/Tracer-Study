<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TracerKerja;
use Illuminate\Support\Facades\Auth;
use App\Models\Alumni;
use App\Models\TracerKuliah;
use App\Models\Testimoni;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.dashboard', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('user.pekerjaan.index')
            ->with('success', 'Data pekerjaan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('user.pekerjaan.index')
            ->with('success', 'Data pekerjaan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function storePekerjaan(Request $request)
    {
        $validated = $request->validate([
            'tracer_kerja_pekerjaan' => 'required',
            'tracer_kerja_nama' => 'required',
            'tracer_kerja_jabatan' => 'required',
            'tracer_kerja_status' => 'required',
            'tracer_kerja_lokasi' => 'required',
            'tracer_kerja_gaji' => 'required|numeric',
            'tracer_kerja_alamat' => 'required',
            'tracer_kerja_tgl_mulai' => 'required|date',
        ]);

        try {
            $alumni = Alumni::where('email', Auth::user()->email)->first();
            $data = [
                'id_alumni' => $alumni->id_alumni,
                'tracer_kerja_pekerjaan' => $request->tracer_kerja_pekerjaan,
                'tracer_kerja_nama' => $request->tracer_kerja_nama,
                'tracer_kerja_jabatan' => $request->tracer_kerja_jabatan,
                'tracer_kerja_status' => $request->tracer_kerja_status,
                'tracer_kerja_lokasi' => $request->tracer_kerja_lokasi,
                'tracer_kerja_gaji' => $request->tracer_kerja_gaji,
                'tracer_kerja_alamat' => $request->tracer_kerja_alamat,
                'tracer_kerja_tgl_mulai' => $request->tracer_kerja_tgl_mulai,
            ];

            $tracer = TracerKerja::create($data);

            return redirect()->back()->with('success', 'Data pekerjaan berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function pekerjaan()
    {
        // Get existing tracer data for the current user
        $alumni = Alumni::where('email', Auth::user()->email)->first();
        $tracer = null;
        
        if ($alumni) {
            $tracer = TracerKerja::where('id_alumni', $alumni->id_alumni)->first();
        }
        
        return view('user.Pekerjaan', compact('tracer'));
    }

    public function dashboard()
    {
        // Get the authenticated user
        $user = Auth::user();
        
        // Get user's tracer data if exists
        $tracer = TracerKerja::where('id_alumni', $user->id)->first();
        
        // Get user's testimoni if exists
        $alumni = Alumni::where('email', Auth::user()->email)->first();
        $testimoni = null;
        
        if ($alumni) {
            $testimoni = Testimoni::where('id_alumni', $alumni->id_alumni)->first();
        }
        
        return view('user.dashboard', compact('user', 'tracer', 'testimoni'));
    }

    public function kuliah()
    {
        // Get existing tracer data for the current user
        $alumni = Alumni::where('email', Auth::user()->email)->first();
        $tracer = null;
        
        if ($alumni) {
            $tracer = TracerKuliah::where('id_alumni', $alumni->id_alumni)->first();
        }
        
        return view('user.Kuliah', compact('tracer'));
    }

    public function storeKuliah(Request $request)
    {
        $validated = $request->validate([
            'tracer_kuliah_kampus' => 'required',
            'tracer_kuliah_status' => 'required',
            'tracer_kuliah_jenjang' => 'required',
            'tracer_kuliah_jurusan' => 'required',
            'tracer_kuliah_linier' => 'required',
            'tracer_kuliah_alamat' => 'required',
        ]);

        try {
            $alumni = Alumni::where('email', Auth::user()->email)->first();
            $data = [
                'id_alumni' => $alumni->id_alumni,
                'tracer_kuliah_kampus' => $request->tracer_kuliah_kampus,
                'tracer_kuliah_status' => $request->tracer_kuliah_status,
                'tracer_kuliah_jenjang' => $request->tracer_kuliah_jenjang,
                'tracer_kuliah_jurusan' => $request->tracer_kuliah_jurusan,
                'tracer_kuliah_linier' => $request->tracer_kuliah_linier,
                'tracer_kuliah_alamat' => $request->tracer_kuliah_alamat,
            ];

            $tracer = TracerKuliah::create($data);

            return redirect()->back()->with('success', 'Data kuliah berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updatePekerjaan(Request $request, $id)
    {
        $validated = $request->validate([
            'tracer_kerja_pekerjaan' => 'required',
            'tracer_kerja_nama' => 'required',
            'tracer_kerja_jabatan' => 'required',
            'tracer_kerja_status' => 'required',
            'tracer_kerja_lokasi' => 'required',
            'tracer_kerja_gaji' => 'required|numeric',
        ]);

        try {
            $tracer = TracerKerja::findOrFail($id);
            
            // Verify ownership
            $alumni = Alumni::where('email', Auth::user()->email)->first();
            if ($tracer->id_alumni !== $alumni->id_alumni) {
                return redirect()->back()->with('error', 'Unauthorized access');
            }

            $tracer->update([
                'tracer_kerja_pekerjaan' => $request->tracer_kerja_pekerjaan,
                'tracer_kerja_nama' => $request->tracer_kerja_nama,
                'tracer_kerja_jabatan' => $request->tracer_kerja_jabatan,
                'tracer_kerja_status' => $request->tracer_kerja_status,
                'tracer_kerja_lokasi' => $request->tracer_kerja_lokasi,
                'tracer_kerja_alamat' => $request->tracer_kerja_alamat,
                'tracer_kerja_tgl_mulai' => $request->tracer_kerja_tgl_mulai,
                'tracer_kerja_gaji' => $request->tracer_kerja_gaji
            ]);

            return redirect()->back()->with('success', 'Data pekerjaan berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateKuliah(Request $request, $id)
    {
        $validated = $request->validate([
            'tracer_kuliah_kampus' => 'required',
            'tracer_kuliah_jurusan' => 'required',
            'tracer_kuliah_jenjang' => 'required',
            'tracer_kuliah_status' => 'required',
            'tracer_kuliah_linier' => 'required',
            'tracer_kuliah_alamat' => 'required',
        ]);

        try {
            $tracer = TracerKuliah::findOrFail($id);
            
            // Verify ownership
            $alumni = Alumni::where('email', Auth::user()->email)->first();
            if ($tracer->id_alumni !== $alumni->id_alumni) {
                return redirect()->back()->with('error', 'Unauthorized access');
            }
    
            $tracer->update([
                'tracer_kuliah_kampus' => $request->tracer_kuliah_kampus,
                'tracer_kuliah_jurusan' => $request->tracer_kuliah_jurusan,
                'tracer_kuliah_jenjang' => $request->tracer_kuliah_jenjang,
                'tracer_kuliah_status' => $request->tracer_kuliah_status,
                'tracer_kuliah_linier' => $request->tracer_kuliah_linier,
                'tracer_kuliah_alamat' => $request->tracer_kuliah_alamat,
            ]);
    
            return redirect()->back()->with('success', 'Data kuliah berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function storeTestimoni(Request $request)
    {
        $validated = $request->validate([
            'testimoni' => 'required|string',
        ]);

        try {
            $alumni = Alumni::where('email', Auth::user()->email)->first();
            $data = [
                'id_alumni' => $alumni->id_alumni,
                'testimoni' => $request->testimoni,
                'tgl_testimoni' => now(),
            ];

            $testimoni = Testimoni::create($data);

            return redirect()->back()->with('success', 'Testimoni berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateTestimoni(Request $request, $id)
    {
        $validated = $request->validate([
            'testimoni' => 'required|string',
        ]);

        try {
            $testimoni = Testimoni::findOrFail($id);
            
            // Verify ownership
            $alumni = Alumni::where('email', Auth::user()->email)->first();
            if ($testimoni->id_alumni !== $alumni->id_alumni) {
                return redirect()->back()->with('error', 'Unauthorized access');
            }

            $testimoni->update([
                'testimoni' => $request->testimoni,
                'tgl_testimoni' => now(),
            ]);

            return redirect()->back()->with('success', 'Testimoni berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteTestimoni($id)
    {
        try {
            $testimoni = Testimoni::findOrFail($id);
            
            // Verify ownership
            $alumni = Alumni::where('email', Auth::user()->email)->first();
            if ($testimoni->id_alumni !== $alumni->id_alumni) {
                return redirect()->back()->with('error', 'Unauthorized access');
            }

            $testimoni->delete();

            return redirect()->back()->with('success', 'Testimoni berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function profil()
    {
        // Mengambil data user yang sedang login beserta relasinya
        $alumni = Alumni::where('email', Auth::user()->email)->with([
            'tracerKerja',
            'tracerKuliah', 
            'tahunLulus',
            'konsentrasiKeahlian',
            'statusAlumni'
        ])->first();

        // Jika alumni tidak ditemukan
        if (!$alumni) {
            return redirect()->back()->with('error', 'Data alumni tidak ditemukan');
        }

        return view('user.profil', compact('alumni'));
    }

    public function destroyPekerjaan($id)
    {
        try {
            $tracer = TracerKerja::findOrFail($id);
            $tracer->delete();
            
            return redirect()->route('user.pekerjaan.index')
                ->with('success', 'Data pekerjaan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data pekerjaan');
        }
    }
}
