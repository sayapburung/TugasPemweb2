<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis_simpanan extends Model
{
    //
     protected $table ='jenis_simpanan';
    protected $fillable = ['*'];
    protected $visible = ['*'];
    public $timestamps = true;


    public function simpanan () 
    {
    	return $this->hasMany('App\simpanan');
    }

}
