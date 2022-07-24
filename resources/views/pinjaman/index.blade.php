@extends('layouts.admin')
@section('content')
	<h3> Form pinjaman </h3>
        <div class="col-xs-20">
          <div class="box">
	<br>

	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah Data</button>




<a href="deleteAll" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus semuanya?');">Delete All</a>
<br>

	
		<div class="panel-heading"><!--  Data Gudang -->
		</div>
		<div class="panel-body">
			<table class="table" id="karyawan">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Pinjaman</th>
						<th>Nama Anggota</th>
						<th>Tanggal Pinjam</th>
						<th>Besar Pinjam</th>
						<th>Bunga</th>
						<th>Tenor</th>
						<th>Total Pinjaman</th>
						<th>Angsuran</th>
						<th>Sisa Angsuran</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@php $no=1; @endphp
				@foreach($pinjaman as $data)
				<tr>
				<td>{{$no++}}</td>
				<td>{{$data->id}}</td>
				<td>{{$data->anggota->nama_anggota}}</td>
				<td>{{$data->tanggal}}</td>
				<td>Rp.{{ number_format ($data->jumlah, 2)}}</td>
				<td>Rp.{{ number_format ($data->bunga, 2)}}</td>
					<td>{{$data->lama_bulan}}</td>
				<td>Rp.{{ number_format ($data->total, 2)}}</td>
				<td>Rp.{{ number_format ($data->angsuran, 2)}}</td>
				<td>Rp.{{ number_format ($data->sisa_angsuran, 2)}}</td>
				<td>@if($data->sisa_angsuran == 0)
				Lunas
			@else
		Belum lunas
	@endif</td>

				<td>
				<div class="navbar-collapse collapse">
            	<ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-wrench"></i>  <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                    <!-- <center><a class="btn btn-warning" data-toggle="modal" data-target="#myEdit{{$data->id}}"><i class="glyphicon glyphicon-edit"> Edit </i></a> -->
                   	<form action="{{route('pinjaman.destroy',$data->id)}}" method="post" class="delete">
                <input name="_method" type="hidden" value="DELETE">
        	<input name="_token" type="hidden" >
        	{{csrf_field()}}
			<button type="submit" class="btn btn-danger" value="Delete" id="delete-btn"><i class="glyphicon glyphicon-trash"> Delete </i></button></form></center>
                   
                    </ul>
                </li>
				
				</form>
				</td>
			</td>


			<!-- Modal EDIT-->
<div id="myEdit{{$data->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('pinjaman.update',$data->id) }}" method="post">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				
			 <div class="form-group">
			<label class="control-label">Nama Anggota</label>
			<select class="form-control" name="id_anggota">
				@foreach($anggota as $dd)
				<option value="{{$dd->id}}">{{$dd->nama_anggota}}</option>
				@endforeach
			</select>
		</div>

				<div class="form-group">
					<label class="control-label">tanggal transaksi</label>
					<input type="date" name="tanggal" files="true" value="{{$data->tanggal}}" class="form-control">

					<div class="form-group">
					<label class="control-label">lama_bulan </label>
					<input type="text" name="lama_bulan" files="true" value="{{$data->lama_bulan}}" class="form-control">

				<div class="form-group">
					<label class="control-label">jumlah pinjam </label>
					<input type="text" name="jumlah" files="true" value="{{$data->jumlah}}" class="form-control">
				
				</div>
			</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
			</form>
      		</div>

      		 </div>
@endforeach
	</tbody>
	</table>      
			
			<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <div class="modal-body">
      <form action="{{ route('pinjaman.store') }}" method="post">
			{{csrf_field()}}

			
			 <div class="form-group">
			<label class="control-label">Nama Anggota :</label>
			<select class="form-control" name="id_anggota">
				@foreach($anggota as $data)
				<option value="{{$data->id}}">{{$data->nama_anggota}}</option>
				@endforeach
			</select>
		</div>
<br>

        <div class="form-group">
				<label class="control-label">Tanggal Pinjam</label>
				<input type="date" name="tanggal" class="form-control" required="">
<br>
		  <div class="form-group">
				<label class="control-label">Tenor </label>
				<input type="text" name="lama_bulan" class="form-control" required="">
<br>
	  <div class="form-group">
				<label class="control-label">Besar Pinjam</label>
				<input type="text" name="jumlah" class="form-control" required="">

	
</div>
</div></div>
			<div class="form-group">
				<button type="submit" class="btn btn-info">Done</button>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
    </div>

		</div>
	</div>
</div> 
</div>

@endsection