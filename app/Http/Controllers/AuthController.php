<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $user = DB::table('users')
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if($user){
Session::put('login', true);

Session::put('id_user', $user->id);

Session::put('nama', $user->nama);

Session::put('level', $user->level);

            return redirect('/dashboard');

        } else {

            return redirect('/login')
                ->with('error', 'Email atau password salah');

        }
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */

    public function register()
    {
        return view('register');
    }

    public function prosesRegister(Request $request)
    {
        if($request->password != $request->password_confirmation){

            return redirect('/register')
                ->with('error', 'Confirm password tidak sama');

        }

        DB::table('users')->insert([

            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'level' => 'owner',
            'created_at' => now(),
            'updated_at' => now()

        ]);

        return redirect('/login')
            ->with('success', 'Register berhasil');
    }

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    public function profile()
    {
        $user = User::find(
            session('id_user')
        );

        return view(
            'profile',
            compact('user')
        );
    }

    public function updateProfile(Request $request)
    {
        $user = User::find($request->id);

        $user->nama = $request->nama;

        $user->email = $request->email;

        if($request->password){

            $user->password = $request->password;

        }

        $user->save();

        Session::put(
            'nama',
            $user->nama
        );

        return redirect('/dashboard')
            ->with(
                'success',
                'Profile berhasil diupdate'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout()
    {
        Session::flush();

        return redirect('/login');
    }
}
