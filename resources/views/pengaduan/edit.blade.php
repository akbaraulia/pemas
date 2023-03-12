@extends('pengaduan.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit</h2>
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
     
<form action="{{ route('approve',$pengaduan->id) }}" method="POST" enctype="multipart/form-data"> 
    @csrf

    @method('PUT')
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Pengaduan:</strong>
                <input type="date" name="tgl_pengaduan" value="{{ $pengaduan->tgl_pengaduan }}" class="form-control" placeholder="TGL PENGADUAN">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User ID:</strong>
                <input type="char" name="user_id" class="form-control" placeholder="User ID">
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Isi Laporan :</strong>
                <input type="text" name="isi_laporan" class="form-control" placeholder="Isi Laporan">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong>
                <input type="file" name="foto" class="form-control" placeholder="Foto" >
            </div>
        </div>
        @if (Auth :: user()->role == 'admin')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <select name="status" id="" class="form-control">
                                                    <option value="pengajuan">Pengajuan</option>
                                                    <option value="on_proses">Sedang Di Proses</option>
                                                    <option value="selesai">Selesai</option>


                                                </select>
                
            </div>
        </div>
               <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
</form>
@endif
@endsection