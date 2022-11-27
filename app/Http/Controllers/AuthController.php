<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

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
            'prodiId' => $request->prodiId,
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

    public function login(Request $request)
    {
        $nim = $request->nim;
        $password = $request->password;

        $user = Mahasiswa::where('nim', $nim)->first();

        if (!$user) {
            return response()->json([
                'status' => 'Error',
                'message' => 'user not exist',
            ],404);
        }

        if (!Hash::check($password, $user->password)) {
            return response()->json([
                'status' => 'Error',
                'message' => 'wrong password',
            ],400);
        }

        // $idprodi = DB::select("SELECT idProdi FROM mahasiswas");
        // $prodi = Prodi::where('idProdi', print_r($idprodi))->first();

        return response()->json([
            'status' => 'Success',
            'message' => 'successfully login',
            'data' => [
                'user' => $user,
                // 'prodi' => $prodi,
            ]
        ],200);
    }

}
