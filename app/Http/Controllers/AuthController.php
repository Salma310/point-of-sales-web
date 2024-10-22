<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;




class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) { // Jika sudah login, maka redirect ke halaman home
            return redirect('/');
        }
        
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }

        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }


    public function register()
    {
        $level = LevelModel::select('level_id', 'level_nama')->get();
        return view('auth.register')->with('level', $level);
    }
    public function postRegister(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|string|min:3|unique:m_user,username',
                'nama' => 'required|string|max:100',
                'password' => 'required|min:5'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }
            // Hash password sebelum disimpan
            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            // Simpan data user
            UserModel::create($data);
            return response()->json([
                'status' => true,
                'message' => 'Selamat, Registrasi berhasil!',
                'redirect' => url('login') // Redirect ke halaman login
            ]);
        }
        // Jika bukan AJAX, arahkan ke halaman login
        return redirect('login')->with('success', 'Registrasi berhasil!');
    }

    // public function regist()
    // {
    //     $level = LevelModel::select('level_id', 'level_nama')->get();
    //     return view('auth.regist')->with('level', $level); // Tampilkan form registrasi (blade view)
    // }

    // public function postRegist(Request $request)
    // {
    //     // Pastikan bahwa ini adalah permintaan AJAX
    //     if ($request->ajax() || $request->wantsJson()) {
    //         // Aturan validasi
    //         $rules = [
    //             'level_id' => 'required|integer',
    //             'username' => 'required|string|min:3|max:20|unique:m_user,username', // Tambah batas maksimal untuk username
    //             'nama' => 'required|string|max:100',
    //             'password' => 'required|min:5',
    //             'retype_password' => 'required|same:password', // Validasi retype password
    //             'terms' => 'required' // Validasi jika setuju dengan syarat
    //         ];

    //         $validator = Validator::make($request->all(), $rules);
    //         if ($validator->fails()) {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Validasi Gagal',
    //                 'msgField' => $validator->errors(),
    //             ]);
    //         }

    //         // Hash password sebelum disimpan
    //         $data = $request->all();
    //         $data['password'] = Hash::make($request->password);
    //         // Simpan data user
    //         UserModel::create($data);
            
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Data user berhasil disimpan',
    //             'redirect' => url('login') // Redirect ke halaman login
    //         ]);
    //     }

    //     // Jika bukan AJAX, kembalikan respons 404
    //     return response()->json([
    //         'status' => false,
    //         'message' => 'Permintaan tidak valid',
    //     ], 404);
    // }
    // public function postRegist(Request $request)
    // {
    //     if ($request->ajax() || $request->wantsJson()) {
    //         $rules = [
    //             'level_id' => 'required|integer',
    //             'username' => 'required|string|min:3|unique:m_user,username',
    //             'nama' => 'required|string|max:100',
    //             'password' => 'required|min:5'
    //         ];
    //         $validator = Validator::make($request->all(), $rules);
    //         if ($validator->fails()) {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Validasi Gagal',
    //                 'msgField' => $validator->errors(),
    //             ]);
    //         }
    //         // Hash password sebelum disimpan
    //         $data = $request->all();
    //         $data['password'] = Hash::make($request->password);
    //         // Simpan data user
    //         UserModel::create($data);
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Data user berhasil disimpan',
    //             'redirect' => url('login') // Redirect ke halaman login
    //         ]);
    //     }
    //     // Jika bukan AJAX, arahkan ke halaman login
    //     return redirect('login')->with('success', 'Registrasi berhasil!');
    // }

}
