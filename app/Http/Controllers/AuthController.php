<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

use Firebase\JWT\JWT;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
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
  
      $user = Mahasiswa::find($nim);
  
      if (!$user) {
        return response()->json([
          'status' => 'Error',
          'message' => 'user not exist',
        ], 404);
      }
  
      if (!Hash::check($password, $user->password)) {
        return response()->json([
          'status' => 'Error',
          'message' => 'wrong password',
        ], 400);
      }
  
      $user->token = $this->jwt($user);
      $user->save();
  
      return response()->json([
        'user' => $user,
        'token' => $user->token,
      ], 200);
    }

     private function base64url_encode(String $data): String
    {
        $base64 = base64_encode($data);
        $base64url = strtr($base64, '+/', '-_');

        return rtrim($base64url, '=');
    }

    private function sign(String $header, String $payload, String $secret): String
    {
        $signature = hash_hmac('sha256', "{$header}.{$payload}", $secret, true);
        $signature_base64url = $this->base64url_encode($signature);

        return $signature_base64url;
    }

    protected function jwt(Mahasiswa $user)
    {
      $payload = [
        'iss' => 'lumen-jwt',
        'sub' => $user->nim,
        'iat' => time(),
        'exp' => time() + 60 * 60
      ];
  
      return JWT::encode($payload, env('JWT_SECRET'), 'HS256');
    }

}
