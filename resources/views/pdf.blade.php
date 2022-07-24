<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <title> Cetak Laporan </title>
    <style>
      table{
      border-collapse: collapse;
      width: 100%;
      margin: 0 auto;
  }
  table th{
      border:1px solid #000;
      padding: 3px;
      font-weight: bold;
      text-align: center;
  }
  table td{
      border:1px solid #000;
      padding: 3px;
      vertical-align: top;
  }

    </style>

<body>

    <img src="img/kop 514.jpg" style="float:right" weight="75px" height="75px"> <br><br><br><br><br><br></div>
    <br>
          <div style="text-align: left;">Dicetak Oleh :  {{ Auth::user()->name }}  {{ ucfirst(Auth::user()->role) }}
<br><br><br>

            
    <table>
        <div class="panel-heading"><!--  Data Gudang -->
    </div>
    <div class="panel-body">
      <table class="table" id="karyawan">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Simpanan</th>
            <th>Nama Anggota</th>
            <th>Tanggal Simpan</th>
            <th>Jumlah Simpan</th>
            <th>Pukul</th>
            <th>Total Simpanan</th>
            
          </tr>
        </thead>
        <tbody>
        @php $no=1; @endphp
        @foreach($simpanan as $data)
        <tr>
        <td>{{$no++}}</td>
        <td>{{$data->id}}</td>
        <td>{{$data->anggota->nama_anggota}}</td>
        <td>{{$data->tanggal}}</td>
        <td>Rp.{{ number_format ($data->jumlah, 2)}}</td>
        <td>{{$data->created_at}}</td>
        <td>Rp.{{ number_format ($data->jumlah, 2)}}</td>
        @endforeach
    </table>
</body>
</html>