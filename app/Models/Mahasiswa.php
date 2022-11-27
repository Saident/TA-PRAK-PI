<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{

    public $primaryKey = 'nim';
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
        'prodiId',
        // 'token', not yet
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'id'
    ];

    // public function matkul()
    // {
    //   return $this->hasMany(Matakuliah::class, 'id');
    // }

    public function matkul()
    {
      return $this->belongsToMany(Matakuliah::class, 'mahasiswa_matakuliah','mhsNim','mkId');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodiId');
    }
}