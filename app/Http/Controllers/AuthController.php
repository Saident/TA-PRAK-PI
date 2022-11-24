<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function register(Request $request)
    {
        $password = Hash::make($request->password);

        $user = Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'idProdi' => $request->idProdi,
            'password' => $password,
        ]);

        return response()->json([
            'status' => 'Success',
            'message' => 'new mahasiswa created',
            'data' => [
                'user' => $user,
            ]
        ],200);
    }

    public function login(request $request){}

}
