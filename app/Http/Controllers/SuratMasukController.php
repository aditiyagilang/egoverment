<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Storage;


class SuratMasukController extends Controller
{
    public function create()
    {
        return redirect()->route('surat.index');
    }

    public function index(Request $request)
    {

        $this->middleware(function ($request, $next) {
            if (!$request->session()->has('user_id')) {
                return view('login');
            }
            return $next($request);
        });
        $fileName = $request->session()->get('foto');
        $suratMasuk = SuratMasuk::all();
        // dd($suratMasuk);
        return view('umum.suratmasuk',  ['suratMasuk' => $suratMasuk, 'fileName' => $fileName]);
    }





    public function store(Request $request)
    {
        $request->validate([
            'id_surat' => 'required|string',
            'nama' => 'required|string',
            'perihal' => 'required|string',
            'asalsurat' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png,xls, xlsx,ppt,pptx |max:2048', // Validasi untuk tipe file dan ukuran maksimum
            'tanggal_surat' => 'nullable|date',
            'tanggal_terima' => 'nullable|date',
        ]);

        $userID = $request->session()->get('user_id');
        // Simpan file yang diunggah ke direktori penyimpanan yang diinginkan
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = 'assets/suratmasuk/' . $fileName; // Tentukan path lengkap di sini

        $file->move(public_path('suratmasuk/'), $fileName);

        // Simpan data surat masuk beserta nama file ke database
        $suratMasuk = new SuratMasuk();
        $suratMasuk->id_surat = $request->id_surat;
        $suratMasuk->nama = $request->nama;
        $suratMasuk->perihal = $request->perihal;
        $suratMasuk->asalsurat = $request->asalsurat;
        $suratMasuk->file = $fileName; // Simpan nama file ke dalam database
        $suratMasuk->tanggal_surat = $request->tanggal_surat;
        $suratMasuk->tanggal_terima = $request->tanggal_terima;
        $suratMasuk->user_id = $userID;
        $suratMasuk->save();

        return redirect()->route('surat.index')->with('success', 'Surat masuk berhasil ditambahkan.');
    }







    public function update(Request $request, $id)
    {
        $request->validate([
            'id_surat' => 'required|string',
            'nama' => 'required|string',
            'perihal' => 'required|string',
            'asalsurat' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048', // Validasi untuk tipe file dan ukuran maksimum
            'tanggal_surat' => 'nullable|date',
            'tanggal_terima' => 'nullable|date',
        ]);

        $suratMasuk = SuratMasuk::findOrFail($id);
// dd($suratMasuk);
        // Cek apakah ada file yang diunggah
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('suratmasuk', $fileName);
            $suratMasuk->file = $fileName;
            $file->move(public_path('suratmasuk/'), $fileName);

        }

        // Update data surat masuk
        $suratMasuk->id_surat = $request->id_surat;
        $suratMasuk->nama = $request->nama;
        $suratMasuk->perihal = $request->perihal;
        $suratMasuk->asalsurat = $request->asalsurat;
        $suratMasuk->tanggal_surat = $request->tanggal_surat;
        $suratMasuk->tanggal_terima = $request->tanggal_terima;
        $suratMasuk->save();

        return redirect()->route('surat.index')->with('success', 'Surat masuk berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $suratMasuk = SuratMasuk::find($id);
        $suratMasuk->delete();

        return redirect()->route('surat.index')
                         ->with('success', 'Surat masuk berhasil dihapus.');
    }
}
