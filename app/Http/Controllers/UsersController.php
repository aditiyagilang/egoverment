<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function showLoginForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari user berdasarkan alamat email
        $user = User::where('email', $request->email)->first();
        $password = Hash::make($request->password);
        // dd($password);
        // Verifikasi kata sandi
        if ($user && Hash::check($request->password, $user->password)) {
            // Start session if not started already
            if (!$request->session()->isStarted()) {
                $request->session()->start();
            }

            // Simpan ID pengguna dalam sesi
            $request->session()->put('user_id', $user->id);
            $request->session()->put('foto', $user->foto);

          if($user->level == 'Admin'){
            return redirect('/dashboardadmin');
          }elseif($user->level == 'Kaur Umum'){
            return redirect('/dashboardumum');
          }elseif($user->level == 'Sekretaris'){
            return redirect()->route('dashboard.sekretaris');
          }else{
            return redirect()->route('dashboard.all');
          }
        }

        return redirect('/welcome')->with('error', 'Invalid credentials');
    }




    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function index( Request $request)
    {
        // Mendapatkan semua data jabatan dari database
        $user = User::all();
        $jabatan = Jabatan::all();
        $fileName = $request->session()->get('foto');

        // Mengirimkan data jabatan ke view untuk ditampilkan
        return view('admin.user', ['user' => $user, 'jabatan' => $jabatan, 'fileName' => $fileName]);
    }
    public function showprofil(Request $request)
    {
        // Mendapatkan ID pengguna dari sesi
        $userId = $request->session()->get('user_id');

        // Mendapatkan data pengguna berdasarkan ID dari sesi
        $user = User::where('id', $userId)->first();

        // Jika tidak ditemukan pengguna, Anda dapat menangani kasus ini sesuai kebutuhan
        if (!$user) {
            return redirect()->back()->with('error', 'Profil pengguna tidak ditemukan.');
        }

        // dd($user);
        // Mendapatkan semua data jabatan dari database
        $jabatan = Jabatan::all();

        // Mengirimkan data jabatan ke view untuk ditampilkan
        return view('component.profile', ['user' => $user, 'jabatan' => $jabatan]);
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'alamat' => 'nullable|string',
            'notelp' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
            'jabatan_id' => 'nullable|exists:jabatans,id',
            'telegram_id' => 'nullable|string',
            'level' => 'required'
        ]);

        // Simpan data user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Mengenkripsi kata sandi
        $user->alamat = $request->alamat;
        $user->notelp = $request->notelp;
        $user->jabatan_id = $request->jabatan_id;
        $user->telegram_id = $request->telegram_id;
        $user->level = $request->level;

        // Menyimpan gambar
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $user->id; // Menggunakan ID user sebagai bagian dari nama file
            $path = $file->storeAs('assets/profile', $fileName); // Menyimpan file ke dalam folder public/assets/profile
            $user->foto = $fileName;
            $file->move(public_path($path), $fileName);
        }

        $user->save();

        // Redirect ke halaman yang sesuai
        return redirect('/user')->with('success', 'User berhasil ditambahkan.');
    }



    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'alamat' => 'nullable|string',
            'notelp' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
            'jabatan_id' => 'nullable|exists:jabatans,id',
            'telegram_id' => 'nullable|string',
            'level' => 'required'
        ]);

        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Mengupdate data user
        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = $request->password;

        $user->alamat = $request->alamat;
        $user->notelp = $request->notelp;
        $user->jabatan_id = $request->jabatan_id;
        $user->telegram_id = $request->telegram_id;
        $user->level = $request->level;
        $userId = $request->session()->get('user_id');
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('assets/profile/', $fileName); // Menyimpan file ke dalam folder public/assets/profile
        $user->foto = $fileName;
        $file->move(public_path($path), $fileName);

        $request->session()->put('user_id', $user->id);
        $request->session()->put('foto', $user->foto);
        $user->save();
        // dd($user);

        // Redirect ke halaman yang sesuai
        return redirect('/user')->with('success', 'User berhasil diperbarui.');
    }

    public function updateprofile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'alamat' => 'nullable|string',
            'notelp' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
            'telegram_id' => 'nullable|string',
        ]);

        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Mengupdate data user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->alamat = $request->alamat;
        $user->notelp = $request->notelp;
        $user->telegram_id = $request->telegram_id;

        // Mengupdate foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('assets/profile/', $fileName); // Menyimpan file ke dalam folder public/assets/profile
            $user->foto = $fileName;
            $file->move(public_path($path), $fileName);
        }

        $user->save();
        $request->session()->put('user_id', $user->id);
        $request->session()->put('foto', $user->foto);

        // Redirect ke halaman yang sesuai
        return redirect('/profile')->with('success', 'User berhasil diperbarui.');
    }



    public function destroy($id)
    {
        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Hapus data user
        $user->delete();

        // Redirect ke halaman yang sesuai
        return redirect('/user')->with('success', 'User berhasil dihapus.');
    }
}
