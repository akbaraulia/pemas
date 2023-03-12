@extends('tanggapan.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tanggapan.index') }}"> Back</a>
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
     
<form action="{{ route('tanggapan.update',$tanggapan->id) }}" method="POST" enctype="multipart/form-data"> 
    @csrf

    @method('PUT')
    
    <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="h4 mb-0">Form Tanggapan</h3>
                  </div>
                  <div class="card-body pt-0">
                    <form class="form-horizontal">
                      <div class="row">
                        <label class="col-sm-3 form-label">ID Tanggapan</label>
                        <div class="col-sm-9">
                        <input class="form-control" type="char" name="id_tanggapan" class="form-control" placeholder="ID">
                        </div>
                      </div>
                      <div class="my-4"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">ID Pengaduan</label>
                        <div class="col-sm-9">
                        <input class="form-control" type="char" name="id_pengaduan" class="form-control" placeholder="ID Pengaduan">
                        </div>
                      </div>
                      <div class="my-4"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">Tanggal Tanggapan</label>
                        <div class="col-sm-9">
                        <input class="form-control" type="date" name="tgl_tanggapan" class="form-control">
                        </div>
                      </div>
                      <div class="my-4"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">Tanggapan</label>
                        <div class="col-sm-9">
                          <input class="form-control" type="text" name="tanggapan" class="form-control"><small class="form-text">Jelaskan Tanggapan Secara Detail.</small>
                        </div>
                      </div>
                      <div class="my-4"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">ID Petugas</label>
                        <div class="col-sm-9">
                        <input class="form-control" type="char" name="id_petugas" class="form-control" placeholder="ID Petugas">
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Submit</button>
</form>

@if 
@endsection