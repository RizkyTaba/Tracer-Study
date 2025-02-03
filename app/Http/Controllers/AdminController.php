<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            [
                'label' => 'Alumni Terdaftar',
                'value' => DB::table('tbl_alumni')->count(),
                'icon' => 'users',
                'color' => 'bg-danger',
                'route' => route('alumni.index'),
            ],
            [
                'label' => 'Tracer Kerja Baru',
                'value' => DB::table('tbl_tracer_kerja')->count(),
                'icon' => 'briefcase',
                'color' => 'bg-primary',
                'route' => route('tracer_kerja.index'),
            ],
            [
                'label' => 'Tracer Kuliah Baru',
                'value' => DB::table('tbl_tracer_kuliah')->count(),
                'icon' => 'graduation-cap',
                'color' => 'bg-warning',
                'route' => route('tracer_kuliah.index'),
            ],
            [
                'label' => 'Testimoni',
                'value' => DB::table('tbl_testimoni')->count(),
                'icon' => 'comments',
                'color' => 'bg-success',
                'route' => route('testimoni.index'),
            ],
        ];
        
        // Ambil data alumni terbaru dari database
        $alumni = DB::table('tbl_alumni')->latest()->take(8)->get();
        
        // Kirimkan data ke view
        return view('admin/dashboard', compact('stats', 'alumni'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
