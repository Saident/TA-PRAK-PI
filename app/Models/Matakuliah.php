<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $primaryKey = 'id';
		/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function mahasiswa() {
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_matakuliah','mhsNim','mkId');
      }
}