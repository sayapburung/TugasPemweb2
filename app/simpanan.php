<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class simpanan extends Model
{
    //
      protected $table ='simpanan';
    protected $fillable = ['*'];
    protected $visible = ['*'];
    public $timestamps = true;


    public function anggota() 
    {
    	return $this->belongsTo('App\anggota','id_anggota');
    }

  

}
