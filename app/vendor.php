<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    //
      protected $table ='vendor';
    protected $fillable = ['nama_vendor', 'alamat','npwp'];
    protected $visible = ['nama_vendor', 'alamat','npwp'];
    public $timestamps = true;


    public function kontak2 () 
    {
    	return $this->hasMany('App\kontak2');
    }
}
