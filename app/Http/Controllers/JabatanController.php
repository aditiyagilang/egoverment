<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Http\Controllers\Controller;

class JabatanController extends Controller
{
    public function index(Request $request)
{
    // Mendapatkan semua data jabatan dari database
    $jabatan = Jabatan::all();

    // Mendapatkan nama file foto dari sesi
    $fileName = $request->session()->get('foto');

    // Mengirimkan data jabatan dan nama file foto ke view untuk ditampilkan
    return view('admin.jabatan', ['jabatan' => $jabatan, 'fileName' => $fileName]);
}


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan data jabatan
        $jabatan = new Jabatan();
        $jabatan->nama = $request->nama;
        $jabatan->deskripsi = $request->deskripsi;
        $jabatan->save();

        // Redirect ke halaman yang sesuai
        return redirect('/jabatan')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Temukan jabatan berdasarkan ID
        $jabatan = Jabatan::find($id);

        if(!$jabatan) {
            return redirect('/jabatan')->with('error', 'Jabatan tidak ditemukan.');
        }

        // Update data jabatan
        $jabatan->nama = $request->nama;
        $jabatan->deskripsi = $request->deskripsi;
        $jabatan->save();

        // Redirect ke halaman yang sesuai
        return redirect('/jabatan')->with('success', 'Jabatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Temukan jabatan berdasarkan ID
        $jabatan = Jabatan::find($id);

        if(!$jabatan) {
            return redirect('/jabatan')->with('error', 'Jabatan tidak ditemukan.');
        }

        // Hapus data jabatan
        $jabatan->delete();
        // dd($jabatan->delete());

        // Redirect ke halaman yang sesuai
        return redirect('/jabatan')->with('success', 'Jabatan berhasil dihapus.');
    }

}
