<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ProfilUserModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{
    public function index()
{
    $activeMenu = 'profil';
    $breadcrumb = (object) [
        'title' => 'Profil  User',
        'list' => ['Home', 'Profile']
    ];
    $page = (object) [
        'title' => 'Upload foto'
    ];

    $user = Auth::user();
    $profil = $user->profil; // Ambil data profil

    return view('profil.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'profil' => $profil, 'activeMenu' => $activeMenu]);
}

    public function update(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = Auth::user();
        // Jika ada avatar lama, hapus dari storage
        if ($user->avatar) {
            Storage::delete('public/avatars/' . $user->avatar);
        }
        if ($request->file('avatar')) {
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/avatars', $avatarName);
            /** @var \App\Models\User $user **/
            $user->avatar = $avatarName;
            $user->save();
        } // Upload avatar baru
        return redirect()->route('profil.index')->with('success', 'Foto Profil Berhasil Diperbarui!');
    }
    public function updateDataDiri(Request $request)
    {
        // Validasi input menggunakan Validator langsung
        $rules = [
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:50',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ];
        // Jalankan validasi
        $validator = Validator::make($request->all(), $rules);
        // Jika validasi gagal, kembalikan pesan error dalam format JSON
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi Gagal',
                'msgField' => $validator->errors(),
            ]);
        }
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->nama = $request->nama;
        $user->save();
        // Update data profil di tabel profil_user
        $profil = $user->profil; // Mengambil data profil yang terkait
        // Periksa jika profil ada
        if ($profil) {
            $profil->tempat_lahir = $request->tempat_lahir;
            $profil->tanggal_lahir = $request->tanggal_lahir;
            $profil->jenis_kelamin = $request->jenis_kelamin;
            $profil->agama = $request->agama;
            $profil->no_hp = $request->no_hp;
            $profil->alamat = $request->alamat;
            $profil->save(); // Simpan perubahan pada profil
        } else {
            return redirect('/profil')->with('error', 'Profil tidak ditemukan.');
        }
        return redirect('/profil')->with('success', 'Data Profil Berhasil Diperbarui!');
    }
    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|same:new_password',
        ]);
        // Cek apakah password lama sesuai dengan password user yang sedang login
        $currentPassword = Auth::user()->password;
        if (!Hash::check($request->old_password, $currentPassword)) {
            return redirect()->back()->withErrors(['old_password' => 'Password lama tidak sesuai']);
        }
        /** @var \App\Models\User $user */
        // Update password baru
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('success', 'Password berhasil diubah');
    }
public function showUserProfile($id)
{
    $user = UserModel::find($id);
    if ($user) {
        $jenisKelamin = $user->profil ? $user->profil->jenis_kelamin : 'Tidak Diketahui';
        return view('user.profile', compact('user', 'jenisKelamin'));
    }
    return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
}
public function updateAvatar(Request $request)
{
    // Validasi input
    $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    // Ambil pengguna yang sedang login
    $user = auth()->user();
    // Simpan file avatar
    if ($request->hasFile('avatar')) {
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        $user->avatar = $avatarPath; // Atur path avatar ke user
        $user = auth()->user(); // Simpan perubahan ke database
    }
    return redirect()->back()->with('success', 'Avatar berhasil diperbarui.');
}
}