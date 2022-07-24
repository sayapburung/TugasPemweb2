<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    //
       protected $table ='anggota';
    protected $fillable = ['*'];
    protected $visible = ['*'];
    public $timestamps = true;


    public function simpanan () 
    {
    	return $this->hasMany('App\simpanan','id_anggota');
    }

     public function pinjaman () 
    {
    	return $this->hasMany('App\pinjaman','id_anggota');
    }

}
