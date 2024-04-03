<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data artikel dari database
        $articles = DB::table('artikel')->get();
        $jml_komentar = DB::table('komentar')->count();
        $jml_artikel = DB::table('artikel')->count();
        
        // Mengirimkan data artikel ke view
        return view('admin/dashboard', compact('articles', 'jml_komentar', 'jml_artikel'));
    }

    public function search(Request $request)
    {
        $jml_komentar = DB::table('komentar')->count();
        $jml_artikel = DB::table('artikel')->count();

        $keyword = $request->input('keyword');
        
        // Melakukan pencarian artikel berdasarkan judul_artikel, tgl_terbit, dan isi_artikel
        $articles = DB::table('artikel')
            ->where('judul_artikel', 'LIKE', "%{$keyword}%")
            ->orWhere('tgl_terbit', 'LIKE', "%{$keyword}%")
            ->orWhere('isi_artikel', 'LIKE', "%{$keyword}%")
            ->get();

        return view('admin/dashboard', compact('articles', 'jml_komentar', 'jml_artikel'));
    }
}
