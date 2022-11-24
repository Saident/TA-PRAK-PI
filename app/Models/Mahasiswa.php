<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
		/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nim',
        'nama', 
        'angkatan',
        'password',
        'token',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function mhs_matkul()
    {
      return $this->hasMany(Matakuliah::class, 'id');
    }

    public function mhs_prodi()
    {
        return $this->hasOne(Prodi::class, 'id');
    }
}