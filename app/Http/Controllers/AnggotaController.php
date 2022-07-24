<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anggota;
use Alert;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $anggota = anggota::all();
        return view ('anggota.index',compact('anggota'));
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
        //
         $anggota = new anggota;
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->alamat = $request->alamat;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
         $anggota->alamat = $request->alamat;
          $anggota->telepon = $request->telepon;
           $anggota->jenis_kelamin = $request->jenis_kelamin;
            $anggota->pekerjaan = $request->pekerjaan;
              $anggota->status = $request->status;
        $anggota->save();
        Alert::success('Tambah Data','Berhasil' )->autoclose(1500);
        return redirect('admin/anggota');
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
        $anggota = anggota::findOrFail($id);
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->alamat = $request->alamat;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->telepon = $request->telepon;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
         $anggota->pekerjaan = $request->pekerjaan;
           $anggota->status = $request->status;
        $anggota->save();
        Alert::success('Edit Data','Berhasil' )->autoclose(1500);
        return redirect('admin/anggota');
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
         $anggota=anggota::find($id);
        anggota::find($id)->delete();
        Alert::success('Anggota Berhasil Dihapus')->autoclose(1500);
        return redirect('admin/anggota');
    }
    
}
