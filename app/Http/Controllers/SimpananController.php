<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anggota;
use App\simpanan;
use Alert;
class SimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $anggota= anggota::all();
        $simpanan = simpanan::all();
     

        return view ('simpanan.index',compact('simpanan','anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $simpanan= simpanan::where('id_anggota',$request->id_anggota)->get();

        if($simpanan->count() == 0)
        {               
            $p= new simpanan;
            $p->jumlah=$request->jumlah;
            $p->id_anggota= $request->id_anggota;
            $p->tanggal = $request->tanggal;
            $p->total= $request->jumlah;
            $p->save();

            Alert::success('Tambah Data','Berhasil' )->autoclose(1500);
            return redirect('admin/simpanan');   
         }elseif($simpanan->count() > 0){
            $p= new simpanan;
            $p->jumlah=$request->jumlah;
            $p->id_anggota= $request->id_anggota;
            $p->tanggal = $request->tanggal;
            $total = simpanan::where('id_anggota',$request->id_anggota)->max('total');
            $p->total= $total + $request->jumlah;
            $p->save();
        
            Alert::success('Ditambahkan ','Berhasil' )->autoclose(1500);
            return redirect('admin/simpanan');
         }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
              $simpanan= simpanan::where('id_anggota',$request->id_anggota)->get();

        if($simpanan->count() == 0)
        {               
            $p= new simpanan;
            $p->jumlah=$request->jumlah;
            $p->id_anggota= $request->id_anggota;
            $p->tanggal = $request->tanggal;
            $p->total= $request->jumlah;
            $p->save();

            Alert::success('Tambah Data','Berhasil' )->autoclose(1500);
            return redirect('admin/simpanan');   
         }elseif($simpanan->count() > 0){
            $p= new simpanan;
            $p->jumlah=$request->jumlah;
            $p->id_anggota= $request->id_anggota;
            $p->tanggal = $request->tanggal;
            $total = simpanan::where('id_anggota',$request->id_anggota)->max('total');
            $p->total= $total + $request->jumlah;
            $p->save();
        
            Alert::success('Ditambahkan ','Berhasil' )->autoclose(1500);
            return redirect('admin/simpanan');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
           $simpanan=simpanan::find($id);
        simpanan::find($id)->delete();
        Alert::success('User deleted successfully')->autoclose(1500);
        return redirect('admin/simpanan');
    }
}
