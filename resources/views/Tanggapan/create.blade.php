@extends('tanggapan.layout')
@if (auth()->user()->level == 'admin' || 'petugas')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('pengaduan.index') }}"> Back</a>
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
     
<form action="{{ route('tanggapan.store') }}" method="POST" enctype="multipart/form-data"> 
    @csrf
    <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="h4 mb-0">Form Tanggapan</h3>
                  </div>
                  <div class="card-body pt-0">
                    <form class="form-horizontal">
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
                        <div class="col-sm-9">
                        <input class="form-control" style="display:none" type="text" name="id_petugas" value="<?= Auth::user()->id ?>">

                      </div>
                      </div>
                      <div class="row">
                      <label class="col-sm-3 form-label">Foto :</label>
                        <div class="col-sm-9">
                        <input type="file" name="foto" class="form-control" placeholder="Foto" >
                        
                      <button class="btn btn-primary" type="submit">Submit</button>
</form>

@endsection
@endif