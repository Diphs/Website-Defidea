<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 

class ArtikelController extends Controller
{
    public function index()
    {
        // Mengambil data artikel dari database
        $articles = DB::table('artikel')->get();
        $jml_komentar = DB::table('komentar')->count();
        $jml_artikel = DB::table('artikel')->count();
        
        // Mengirimkan data artikel ke view
        return view('admin/artikel', compact('articles', 'jml_komentar', 'jml_artikel'));
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

        return view('admin/artikel', compact('articles', 'jml_komentar', 'jml_artikel'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'gambar_artikel' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul_artikel' => 'required|string|max:255',
            'isi_artikel' => 'required|string',
        ]);

        // Simpan gambar
        $imageName = time() . '.' . $request->gambar_artikel->extension();
        $request->gambar_artikel->move(public_path('assets/gambar'), $imageName);

        // Tambahkan artikel ke dalam tabel
        DB::table('artikel')->insert([
            'gambar_artikel' => $imageName,
            'judul_artikel' => $request->judul_artikel,
            'isi_artikel' => $request->isi_artikel,
            'tgl_terbit' => Carbon::now(), // Mengambil tanggal dan jam saat ini
        ]);

        return redirect()->route('artikel')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function destroy($id_artikel)
    {
        $affected = DB::table('artikel')->where('id_artikel', $id_artikel)->delete();
        if ($affected) {
            return redirect()->route('artikel')->with('success', 'Artikel berhasil dihapus');
        } else {
            return redirect()->route('artikel')->with('error', 'Gagal menghapus artikel');
        }
    }

    public function edit($id_artikel)
    {
        $article = DB::table('artikel')->where('id_artikel', $id_artikel)->first();
        return view('admin.form_artikel', compact('article'));
    }
    
    public function update(Request $request, $id_artikel)
    {
        $validatedData = $request->validate([
            'articleImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'articleTitle' => 'required|string|max:255',
            'tanggal_publikasi' => 'required|date',
            'articleContent' => 'required|string',
        ]);
    
        $article = DB::table('artikel')->where('id_artikel', $id_artikel)->first();
    
        if ($request->hasFile('articleImage')) {
            if (file_exists(public_path('assets/gambar/' . $article->gambar_artikel))) {
                unlink(public_path('assets/gambar/' . $article->gambar_artikel));
            }
            $imageName = time() . '.' . $request->articleImage->extension();
            $request->articleImage->move(public_path('assets/gambar'), $imageName);
            $article->gambar_artikel = $imageName;
        }else {
            $imageName=$article->gambar_artikel;
        }
    
        DB::table('artikel')->where('id_artikel', $id_artikel)->update([
            'gambar_artikel' => $imageName,
            'judul_artikel' => $request->articleTitle,
            'tgl_terbit' => Carbon::parse($request->tanggal_publikasi)->format('Y-m-d H:i:s'),
            'isi_artikel' => $request->articleContent,
        ]);
    
        return redirect()->route('artikel')->with('success', 'Artikel berhasil diperbarui.');
    }
    
}
