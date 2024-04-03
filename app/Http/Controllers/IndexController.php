<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 

class IndexController extends Controller
{
    public function index()
    {
        $artikels = DB::table('artikel')->get();
        return view('user/index', compact('artikels'));
    }

    public function show($id_artikel)
    {
        $artikel = DB::table('artikel')->where('id_artikel', $id_artikel)->first();
        $komentars = DB::table('komentar')->where('id_artikel', $id_artikel)->get();
        return view('user/detail_artikel', compact('artikel', 'komentars'));
    }

    public function storeComment(Request $request, $id_artikel)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        DB::table('komentar')->insert([
            'isi_komentar' => $request->input('comment'),
            'id_artikel' => $id_artikel,
            'tgl_komentar' => Carbon::now(), 
        ]);

        return redirect()->route('home.detail', $id_artikel)->with('success', 'Komentar berhasil ditambahkan');
    }
}
