@extends('layouts.admin')
@section('content')
    <h3>Form Karyawan</h3>
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php $no=1; @endphp
                @foreach($user as $data)
                <tr>
                <td>{{$no++}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->password}}</td>                       
                <td>
                <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-wrench"></i>  <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                    <center><a class="btn btn-warning" data-toggle="modal" data-target="#myEdit{{$data->id}}"><i class="glyphicon glyphicon-edit"> Edit </i></a>
                    <form action="{{route('karyawan.destroy',$data->id)}}" method="post" class="delete">
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
        <form action="{{ route('karyawan.update',$data->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                

                <div class="form-group">
                    <label class="control-label">Nama Karyawan </label>
                    <input type="text" name="name" value="{{$data->name}}" class="form-control" required="">

<br>
                <div class="form-group">
                    <label class="control-label">Email : </label>
                    <input type="email" name="email" files="true" value="{{$data->email}}" class="form-control">

<br>
                <div class="form-group">
                    <label class="control-label">Password :</label>
                    <input type="password" name="password" class="form-control">

<br>
              
<div class="form-group">
                    <button type="submit" class="btn btn-success">Update</button>
                
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
                </div>
                </div>
                </div>
                </div>
                </div>
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
      <form action="{{ route('karyawan.store') }}" method="post">
            {{csrf_field()}}

            
        

        <div class="form-group">
                <label class="control-label">Nama Karyawan :</label>
                <input type="text" name="name" class="form-control" required="" placeholder="Isi data diri kamu disini">

<br>
            <div class="form-group">
                <label class="control-label"> Email :</label>
                <input type="email" name="email" class="form-control" required="" placeholder="Example@gmail.com">
<br>
            <div class="form-group">
                <label class="control-label"> Password :</label>
                <input type="password" name="password" class="form-control" required="" placeholder="">
<br>


                            <div class="form-group">
                <button type="submit" class="btn btn-info">Tambah</button>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
            </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>


                
      </div>
      
        </form>
    </div>

        </div>
    </div>
</div> 
</div>


@endsection