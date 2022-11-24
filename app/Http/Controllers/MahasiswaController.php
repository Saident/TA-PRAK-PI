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

    public function index(){
        $mahasiswa = Mahasiswa::get();

        return response()->json([
            'success' => true,
            'message' => 'all mahasiswa',
            'mahasiswa' => $mahasiswa,
          ], 200);
    }

    public function profile(){
        
    }

    public function nimprofile(){

    }

    public function addmatkul(){

    }

    public function delmatkul(){

    }
}
