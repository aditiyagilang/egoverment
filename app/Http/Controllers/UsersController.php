<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $user = User::where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            // Start session if not started already
            if (!$request->session()->isStarted()) {
                $request->session()->start();
            }

            // Store user information in the session
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_email', $user->email);
            $request->session()->put('user_password', $user->password);

            return view('admin.index');
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


    public function index()
    {
        // Mendapatkan semua data jabatan dari database
        $user = User::all();
        $jabatan = Jabatan::all();

        // Mengirimkan data jabatan ke view untuk ditampilkan
        return view('admin.user', ['user' => $user, 'jabatan' => $jabatan]);
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
    $user->password = bcrypt($request->password);
    $user->alamat = $request->alamat;
    $user->notelp = $request->notelp;
    $user->jabatan_id = $request->jabatan_id;
    $user->telegram_id = $request->telegram_id;
    $user->level = $request->level;

    // Menyimpan gambar
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
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
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->alamat = $request->alamat;
        $user->notelp = $request->notelp;
        $user->jabatan_id = $request->jabatan_id;
        $user->telegram_id = $request->telegram_id;
        $user->level = $request->level;

        // Menyimpan gambar baru jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('assets/profile/', $fileName); // Menyimpan file ke dalam folder public/assets/profile
            $user->foto = $fileName;
            $file->move(public_path($path), $fileName);
        }

        $user->save();

        // Redirect ke halaman yang sesuai
        return redirect('/user')->with('success', 'User berhasil diperbarui.');
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
