<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anggota;
use App\pembayaran;
use App\pinjaman;
use Alert;
class PembayaranController extends Controller
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
        $pembayaran = pembayaran::all();
          $pinjaman = pinjaman::all();
        return view ('pembayaran.index',compact('pembayaran','anggota','pinjaman'));
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
        $pinjaman= pinjaman::findOrFail($request->id_pinjaman);
        if($pinjaman->sisa_angsuran == 0)
        {
            Alert::success('Telah lunas ','Berhasil' )->autoclose(1500);
            return redirect('admin/pembayaran');
        }

         else{
        $p=pinjaman::find($request->id_pinjaman);
        $p->sisa_angsuran=$p->sisa_angsuran - $request->pembayaran;
        $p->save();
        
         $pembayaran = new pembayaran;
        $pembayaran->id_pinjaman = $request->id_pinjaman;
        $pembayaran->tanggal = $request->tanggal;
         $pembayaran->pembayaran = $request->pembayaran;
        $pembayaran->save();
        

        Alert::success('Tambah Data','Berhasil' )->autoclose(1500);
        return redirect('admin/pembayaran');   
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
         $pinjaman= pinjaman::findOrFail($request->id_pinjaman);
        if($pinjaman->sisa_angsuran == 0)
        {
            Alert::success('Telah lunas ','Berhasil' )->autoclose(1500);
            return redirect('admin/pembayaran');
        }

         else{
        $p=pinjaman::find($request->id_pinjaman);
        $p->sisa_angsuran=$p->sisa_angsuran - $request->pembayaran;
        $p->save();
        
         $pembayaran = new pembayaran;
        $pembayaran->id_pinjaman = $request->id_pinjaman;
        $pembayaran->tanggal = $request->tanggal;
         $pembayaran->pembayaran = $request->pembayaran;
        $pembayaran->save();
        

        Alert::success('Tambah Data','Berhasil' )->autoclose(1500);
        return redirect('admin/pembayaran');   
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
           $pembayaran=pembayaran::find($id);
        pembayaran::find($id)->delete();
        Alert::success('User deleted successfully')->autoclose(1500);
        return redirect('admin/pembayaran');
    }
}
