<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disposisi;
use App\Http\Controllers\Controller;
use App\Models\DisposisiAkses;

class DisposisiController extends Controller
{
    //     public function index(Request $request)
    // {
    //     // Mendapatkan semua data jabatan dari database
    //     $jabatan = Jabatan::all();

    //     // Mendapatkan nama file foto dari sesi
    //     $fileName = $request->session()->get('foto');

    //     // Mengirimkan data jabatan dan nama file foto ke view untuk ditampilkan
    //     return view('admin.jabatan', ['jabatan' => $jabatan, 'fileName' => $fileName]);
    // }
    public function getData(Request $request)
    {
        // Mendapatkan nama file dari session
        $fileName = $request->session()->get('foto');

        // Mengambil data Disposisi yang di-join dengan SuratMasuk
        $data = Disposisi::select('table_disposisi.*', 'table_surat_masuk.*', 'table_disposisi.id as id_disposisi')
            ->join('table_surat_masuk', 'table_disposisi.surat_id', '=', 'table_surat_masuk.id')
            ->get();

        // Mengambil semua data Disposisi Akses
        $dataAkses = DisposisiAkses::all();

        // Mengelompokkan data Disposisi Akses berdasarkan id_disposisi
        $groupedDataAkses = $dataAkses->groupBy('id_disposisi');

        // Mengembalikan data dalam bentuk response JSON
        return view('umum.suratdisposisi', ['data' => $data, 'groupedDataAkses' => $groupedDataAkses, 'fileName' => $fileName]);
    }


    public function store(
        $id
    ) {
        // $request->validate([
        //     'catatan' => 'required|string',
        //     'level.*' => 'string|in:Kaur Umum,Sekretaris,Kepala Desa,Kasi Kesejahteraan,Kasi Pemerintahan,Kasi Pelayanan', // Validasi setiap level
        // ]);
        $catatan = "Belum diberikan Catatan";
        // Simpan data disposisi
        $disposisi = new Disposisi();
        $disposisi->surat_id = $id;
        $disposisi->catatan = $catatan;
        $disposisi->save();

        // // Simpan data disposisi akses
        // foreach ($request->level as $level) {
        //     DisposisiAkses::create([
        //         'id_disposisi' => $disposisi->id,
        //         'level' => $level,
        //     ]);
        // }

        // Redirect ke halaman yang sesuai
        return redirect()->route('surat.index')->with('success', 'Disposisi berhasil ditambahkan.');
    }


    public function disposisi(Request $request,  $id)
    {
        $request->validate([

            'level.*' => 'string|in:Kaur Umum,Sekretaris,Kepala Desa,Kasi Kesejahteraan,Kasi Pemerintahan,Kasi Pelayanan', // Validasi setiap level
        ]);

        // Simpan data disposisi akses
        foreach ($request->level as $level) {
            DisposisiAkses::create([
                'id_disposisi' => $id,
                'level' => $level,
            ]);
        }
        // Redirect ke halaman yang sesuai
        return redirect()->route('disposisi.index')->with('success', 'Disposisi berhasil ditambahkan.');
    }

    // public function update(Request $request, $id)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'deskripsi' => 'nullable|string',
    //     ]);

    //     // Temukan jabatan berdasarkan ID
    //     $jabatan = Jabatan::find($id);

    //     if(!$jabatan) {
    //         return redirect('/jabatan')->with('error', 'Jabatan tidak ditemukan.');
    //     }

    //     // Update data jabatan
    //     $jabatan->nama = $request->nama;
    //     $jabatan->deskripsi = $request->deskripsi;
    //     $jabatan->save();

    //     // Redirect ke halaman yang sesuai
    //     return redirect('/jabatan')->with('success', 'Jabatan berhasil diperbarui.');
    // }

    public function destroy($id)
    {
        // Temukan jabatan berdasarkan ID
        $disposisi = Disposisi::find($id);

        if (!$disposisi) {
            return redirect('disposisi.index')->with('error', 'disposisi tidak ditemukan.');
        }

        // Hapus data disposisi
        $disposisi->delete();
        // dd($disposisi);
        // dd($jabatan->delete());

        // Redirect ke halaman yang sesuai
        return redirect()->route('disposisi.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}
