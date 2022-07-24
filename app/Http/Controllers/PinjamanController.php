<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anggota;
use App\pinjaman;
use Alert;
class PinjamanController extends Controller
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
        $pinjaman = pinjaman::all();
        return view ('pinjaman.index',compact('pinjaman','anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $p= pinjaman::where('id_anggota',$request->id_anggota)->get();

      if($pinjaman->count() == 0){
          $pinjaman = new pinjaman;
          $pinjaman->id_anggota = $request->id_anggota;
          $pinjaman->tanggal = $request->tanggal;
          $pinjaman->jumlah = $request->jumlah;
          $pinjaman->bunga = 10/100 * $request->jumlah;
          $bunga = 10/100 * $request->jumlah;
          $pinjaman->angsuran = $request->jumlah/$request->bulan;
          $total = $request->jumlah + $bunga;
          $pinjaman->total = $request->jumlah + $bunga;
          $pinjaman->sisa_angsuran = $pinjaman->total;
          $pinjaman->save();
          Alert::success('Tambah Data','Berhasil' )->autoclose(1500);
          return redirect('pinjaman');
      }elseif($pinjaman->count() > 0){
          $p = pinjaman::where('id_anggota',$request->id_anggota)->first();
          $pinjaman = pinjaman::find($p->id);
          $pinjaman->id_anggota = $request->id_anggota;
          $pinjaman->tanggal = $request->tanggal;
          $pinjaman->jumlah = $peminjaman->jumlah + $request->jumlah;
          $pinjaman->bunga = 10/100 * ($pinjaman->jumlah + $request->jumlah);
          $bunga = 10/100 * ($pinjaman->jumlah+$request->jumlah);
          $pinjaman->angsuran = $pinjaman->jumlah+$request->jumlah/$request->bulan;
          $total = $pinjaman->jumlah + $request->jumlah + $bunga;
          $pinjaman->total = $pinjaman->jumlah + $request->jumlah + $bunga;
          $pinjaman->sisa_angsuran = $pinjaman->total;
          $pinjaman->save();
          Alert::success('Tambah Data','Berhasil' )->autoclose(1500);
          return redirect('pinjaman');
      }
          
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
          $p= pinjaman::where('id_anggota',$request->id_anggota)->get();

      if($p->count() == 0){
          $pinjaman = new pinjaman;
          $pinjaman->id_anggota = $request->id_anggota;
          $pinjaman->tanggal = $request->tanggal;
          $pinjaman->jumlah = $request->jumlah;
          $pinjaman->bunga = 10/100 * $request->jumlah;
          $bunga = 10/100 * $request->jumlah;
          $pinjaman->lama_bulan= $request->lama_bulan;
          $total = $request->jumlah + $bunga;
          $pinjaman->angsuran = $total / $request->lama_bulan;
          $pinjaman->total = $request->jumlah + $bunga;
          $pinjaman->sisa_angsuran = $pinjaman->total;
          $pinjaman->save();
          Alert::success('Tambah Data','Berhasil' )->autoclose(1500);
          return redirect('admin/pinjaman');
      }elseif($p->count() > 0){
          $p = pinjaman::where('id_anggota',$request->id_anggota)->first();
          $pinjaman = pinjaman::find($p->id);
          $pinjaman->id_anggota = $request->id_anggota;
          $pinjaman->tanggal = $request->tanggal;
          $pinjaman->lama_bulan= $request->lama_bulan + $pinjaman->lama_bulan;
          $pinjaman->jumlah = $pinjaman->jumlah + $request->jumlah;
          $pinjaman->bunga = 10/100 * ($pinjaman->jumlah + $request->jumlah);
          $bunga = 10/100 * ($pinjaman->jumlah + $request->jumlah);
          $total = $pinjaman->jumlah + $bunga;
          $pinjaman->angsuran = $total / $pinjaman->lama_bulan;
          $pinjaman->total = $total;
          $pinjaman->sisa_angsuran = $pinjaman->total;
          $pinjaman->save();
          Alert::success('Tambah Data','Berhasil' )->autoclose(1500);
          return redirect('admin/pinjaman');
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
            $p= pinjaman::where('id_anggota',$request->id_anggota)->get();

      if($p->count() == 0){
          $pinjaman = new pinjaman;
          $pinjaman->id_anggota = $request->id_anggota;
          $pinjaman->tanggal = $request->tanggal;
          $pinjaman->jumlah = $request->jumlah;
          $pinjaman->bunga = 10/100 * $request->jumlah;
          $bunga = 10/100 * $request->jumlah;
          $pinjaman->lama_bulan= $request->lama_bulan;
          $total = $request->jumlah + $bunga;
          $pinjaman->angsuran = $total / $request->lama_bulan;
          $pinjaman->total = $request->jumlah + $bunga;
          $pinjaman->sisa_angsuran = $pinjaman->total;
          $pinjaman->save();
          Alert::success('Tambah Data','Berhasil' )->autoclose(1500);
          return redirect('pinjaman');
      }elseif($p->count() > 0){
          $p = pinjaman::where('id_anggota',$request->id_anggota)->first();
          $pinjaman = pinjaman::find($p->id);
          $pinjaman->id_anggota = $request->id_anggota;
          $pinjaman->tanggal = $request->tanggal;
          $pinjaman->lama_bulan= $request->lama_bulan + $pinjaman->lama_bulan;
          $pinjaman->jumlah = $pinjaman->jumlah + $request->jumlah;
          $pinjaman->bunga = 10/100 * ($pinjaman->jumlah + $request->jumlah);
          $bunga = 10/100 * ($pinjaman->jumlah + $request->jumlah);
          $total = $pinjaman->jumlah + $bunga;
          $pinjaman->angsuran = $total / $pinjaman->lama_bulan;
          $pinjaman->total = $total;
          $pinjaman->sisa_angsuran = $pinjaman->total;
          $pinjaman->save();
          Alert::success('Tambah Data','Berhasil' )->autoclose(1500);
          return redirect('pinjaman');
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
           $pinjaman=pinjaman::find($id);
        pinjaman::find($id)->delete();
        Alert::success('User deleted successfully')->autoclose(1500);
        return redirect('admin/pinjaman');
    }
}
