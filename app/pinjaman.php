<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pinjaman extends Model
{
    //
       protected $table ='pinjaman';
    protected $fillable = ['*'];
    protected $visible = ['*'];
    public $timestamps = true;


    public function anggota() 
    {
    	return $this->belongsTo('App\anggota','id_anggota');
    }
     public function pembayaran () 
    {
    	return $this->belongsTo('App\pembayaran','id_pinjaman');
    }
}
