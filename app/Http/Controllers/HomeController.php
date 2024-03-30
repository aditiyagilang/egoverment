<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Http\Controllers\Controller;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // Mendapatkan semua data jabatan dari database
        $jabatans = Jabatan::all();

        // Inisialisasi array untuk menyimpan jumlah user untuk setiap jabatan
        $jumlahUserPerJabatan = [];

        foreach ($jabatans as $j) {
            // Hitung jumlah user yang memiliki jabatan ini
            $jumlah = User::where('jabatan_id', $j->id)->count();
            // Simpan jumlah dalam array
            $jumlahUserPerJabatan[$j->nama] = $jumlah;
        }
        $excludedRoles = ['Admin', 'Sekretaris', 'Kaur Umum'];

        // Menghitung jumlah data untuk jabatan yang tidak termasuk dalam $excludedRoles
        $jumlahUserLainnya = User::whereNotIn('jabatan_id', function($query) use ($excludedRoles) {
            $query->select('id')->from('jabatans')->whereIn('nama', $excludedRoles);
        })->count();

        // Mengirimkan data jumlah user per jabatan ke view untuk ditampilkan
        return view('admin.index', ['jumlahUserPerJabatan' => $jumlahUserPerJabatan, 'jumlahUserLainnya' => $jumlahUserLainnya]);
    }
}
