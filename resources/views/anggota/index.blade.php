@extends('layouts.admin')
@section('content')
	<h3>Form Anggota</h3>
	 <div class="col-xs-12">
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
						<th>Kode Anggota</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Tanggal Lahir</th>
						<th>Kontak</th>
						<th>Pekerjaan</th>
						<th>Jenis Kelamin</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@php $no=1; @endphp
				@foreach($anggota as $data)
				<tr>
				<td>{{$no++}}</td>
				<td>{{$data->id}}</td>
				<td>{{$data->nama_anggota}}</td>
				<td>{{$data->alamat}}</td>
				<td>{{$data->tanggal_lahir}}</td>
				<td>{{$data->telepon}}</td>
				<td>{{$data->pekerjaan}}</td>
				<td>{{$data->jenis_kelamin}}</td>
				<td>{{$data->status}}</td>									
				<td>
				<div class="navbar-collapse collapse">
            	<ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-wrench"></i>  <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                    <center><a class="btn btn-warning" data-toggle="modal" data-target="#myEdit{{$data->id}}"><i class="glyphicon glyphicon-edit"> Edit </i></a>
                   	<form action="{{route('anggota.destroy',$data->id)}}" method="post" class="delete">
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
        <form action="{{ route('anggota.update',$data->id) }}" method="post">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				

				<div class="form-group">
					<label class="control-label">Naman Anggota : </label>
					<input type="text" name="nama_anggota" value="{{$data->nama_anggota}}" class="form-control" required="">

<br>
				<div class="form-group">
					<label class="control-label">Alamat : </label>
					<input type="text" name="alamat" files="true" value="{{$data->alamat}}" class="form-control">

<br>
				<div class="form-group">
					<label class="control-label">Tanggal Lahir :</label>
					<input type="date" name="tanggal_lahir" files="true" value="{{$data->tanggal_lahir}}" class="form-control">

<br>
				<div class="form-group">
					<label class="control-label">Kontak :</label>
					<input type="text" name="telepon" files="true" value="{{$data->telepon}}" class="form-control">
					
<br>
			<div class="form-group">
				<label class="control-label"> Jenis Kelamin :</label>
				<div>
				<input type="radio" value="laki-laki" name="jenis_kelamin">Laki-laki
					<input type="radio" value="perempuan" name="jenis_kelamin">Perempuan<br>

<br>			
			<div class="form-group">
					<label class="control-label">Pekerjaan :</label>
					<input type="text" name="pekerjaan" files="true" value="{{$data->pekerjaan}}" class="form-control">

<br>
			<div class="form-group">
				<label class="control-label"> Status :</label>
				<div>
				<input type="radio" value="Menikah" name="status">Menikah
				<input type="radio" value="Belum Menikah" name="status">Belum Menikah<br>

				</div>
				</div>
				</div>
				</div>
				</div>
			</div>
	
	

				<div class="form-group">
					<button type="submit" class="btn btn-success">Update</button>
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
      <form action="{{ route('anggota.store') }}" method="post">
			{{csrf_field()}}

			
		

        <div class="form-group">
				<label class="control-label">Nama Anggota :</label>
				<input type="text" name="nama_anggota" class="form-control" required="" placeholder="Isi data diri kamu disini">

<br>
			<div class="form-group">
				<label class="control-label"> Alamat :</label>
				<div>
				<textarea name="alamat" rows="3" cols="69" placeholder="Isi data diri kamu disini"></textarea></div>
<br>
			<div class="form-group">
				<label class="control-label"> Tanggal Lahir :</label>
				<input type="date" name="tanggal_lahir" class="form-control" required="" placeholder="Isi data diri kamu disini">
<br>
			<div class="form-group">
				<label class="control-label"> Kontak :</label>
				<input type="text" name="telepon" class="form-control" required="" placeholder="Isi data diri kamu disini">
<br>
			<div class="form-group">
				<label class="control-label"> Jenis Kelamin :</label>
				<div>
				<input type="radio" value="laki-laki" name="jenis_kelamin">Laki-laki
					<input type="radio" value="perempuan" name="jenis_kelamin">Perempuan<br>
<br>
			<div class="form-group">
				<label class="control-label"> Pekerjaan :</label>
				<input type="text" name="pekerjaan" class="form-control" required="" placeholder="Isi data diri kamu disini">
<br>
			<div class="form-group">
				<label class="control-label"> Status :</label>
				<div>
				<input type="radio" value="Menikah" name="status">Menikah
				<input type="radio" value="Belum Menikah" name="status">Belum Menikah<br>

			</div>
			</div>
				</div>
				</div>
				</div>
				</div>
				</div>
				</div>
			<div class="form-group">
				<button type="submit" class="btn btn-info">Tambah</button>

				
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