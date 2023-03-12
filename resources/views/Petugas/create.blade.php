@extends('petugas.layouts')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('petugas.index') }}"> Back</a>
        </div>
    </div>
</div>
     
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
<form action="{{ route('petugas.store') }}" method="POST" enctype="multipart/form-data"> 
    @csrf
    <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="h4 mb-0">Form Tanggapan</h3>
                  </div>
                  <div class="card-body pt-0">
                    <form class="form-horizontal">
                      <div class="row">
                        <label class="col-sm-3 form-label">ID Petugas</label>
                        <div class="col-sm-9">
                        <input class="form-control" type="char" name="id_petugas" class="form-control" placeholder="ID">
                        </div>
                      </div>
                      <div class="my-4"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">Nama Petugas</label>
                        <div class="col-sm-9">
                        <input class="form-control" type="text" name="nama_petugas" class="form-control" placeholder="Nama Petugas">
                        </div>
                      </div>
                      <div class="my-4"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">Username</label>
                        <div class="col-sm-9">
                        <input class="form-control" type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                      </div>
                      <div class="my-4"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">Password</label>
                        <div class="col-sm-9">
                        <input class="form-control" type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                      </div>
                    
                      <button class="btn btn-primary" type="submit">Submit</button>
</form>
@endsection