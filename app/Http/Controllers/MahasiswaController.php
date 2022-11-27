<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MahasiswaController extends Controller
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

    public function allmhs(){
        $mahasiswa = Mahasiswa::get();

        return response()->json([
            'success' => true,
            'message' => 'all mahasiswa',
            'mahasiswa' => $mahasiswa,
          ], 200);
    }

    public function profile(){
        
    }

    public function nimprofile(Request $request){
        $nim = $request->nim;
        $mahasiswa = Mahasiswa::where('nim','=',$nim)->first();
        // $mahasiswa = Mahasiswa::find($request->nim);

        return response()->json([
            'success' => true,
            'message' => 'Mahasiswa Grabbed',
            'data' => [
                'post' => [
                    'nim' => $mahasiswa->nim,
                    'nama' => $mahasiswa->nama,
                    'angkatan' => $mahasiswa->angkatan,
                    'prodi' => $mahasiswa->prodi,
                ]
            ]
        ]);
    }

    public function addmatkul(){

    }

    public function delmatkul(){

    }
}
