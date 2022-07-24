<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    //
      protected $table ='pembayaran';
    protected $fillable = ['*'];
    protected $visible = ['*'];
    public $timestamps = true;



      public function pinjaman() 
    {
    	return $this->belongsTo('App\pinjaman','id_pinjaman');
    }
}
