@extends('petugas.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List Petugas </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('petugas.create') }}"> Create</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>ID Tanggapan</th>
            <th>ID Pengaduan</th>
            <th>Tanggal Tanggapan</th>
            <th>Tanggapan</th>
            <th>ID Petugas</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tanggapans as $tanggapan)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $tanggapan->id_tanggapan }}</td>
            <td>{{ $tanggapan->id_pengaduan }}</td>
            <td>{{ $tanggapan->tgl_tanggapan }}</td>
            <td>{{ $tanggapan->tanggapan }}</td>
            <td>{{ $tanggapan->id_petugas}}</td>
            <td>
                <form action="{{ route('tanggapan.destroy',$tanggapan->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('tanggapan.edit',$tanggapan->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $tanggapans->links() !!}
        
@endsection