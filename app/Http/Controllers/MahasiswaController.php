<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Matakuliah;

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
        
        $mahasiswa = Mahasiswa::with('prodi')->get();
            return response()->json([
                'mahasiswa' => $mahasiswa,
              ], 200);

    }

    public function profile(Request $request){
        $mahasiswa = $request->user;
        return response()->json([
            'success' => true,
            'mahasiswa' => $mahasiswa,
            'token' => $mahasiswa->token,
        ]);
    }

    public function nimprofile(Request $request){
        $mahasiswa = Mahasiswa::with('matakuliah', 'prodi')->find($request->nim);
        return response()->json([
            'mahasiswa' => $mahasiswa,
        ]);
    }

    public function addmatkul(Request $request){
        $mahasiswa = $request->user;
        $nim = Mahasiswa::find($request->nim);

        if ($mahasiswa->nim != $nim->nim) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorize',
            ], 401);
        }else{
            $mahasiswa->matakuliah()->syncWithoutDetaching($request->mkId);
            return response()->json([
                'success' => true,
                'message' => 'Matkul added to mahasiswa',
            ], 200);
        }
    }

    public function delmatkul(Request $request){
        $mahasiswa = $request->user;
        $nim = Mahasiswa::find($request->nim);

        if ($mahasiswa->nim != $nim->nim) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorize',
            ], 401);
        }else{
            $mahasiswa->matakuliah()->detach($request->mkId);
            return response()->json([
                'success' => true,
                'message' => 'Matkul added to mahasiswa',
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Matkul deleted',
        ], 200);
    }
}
