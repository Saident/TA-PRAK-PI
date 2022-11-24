<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MahasiswaMatkul extends Model
{
		/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mhsNim',
        'mkId', 
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    //blom bikin relasi foreign_key
    public function mhsNim(){}

    //blom bikin relasi foreign_key
    public function mkId(){}
}