<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List Pengaduan </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pengaduan.create') }}"> Create</a>
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
            <th>ID</th>
            <th>Tanggal Pengaduan</th>
            <th>Nik</th>
            <th>Isi Laporan</th>
            <th>Foto</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pengaduans as $pengaduan)
      
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $pengaduan->tgl_pengaduan }}</td>
            <td>{{ $pengaduan->nik }}</td>
            <td>{{ $pengaduan->isi_laporan }}</td>
            <td>
                <img src="{{ asset('uploads/'.$pengaduan->foto) }}" alt="" width="200" height="200">
            </td>
            <td>{{ $pengaduan->status}}</td>
            <td>
                
           
                    <a class="btn btn-primary" href="{{ route('pengaduan.edit',$pengaduan->id) }}">Edit</a>
                    <!-- Button trigger modal -->
                    <a class="btn btn-primary" href="{{ route('pengaduan.approval',$pengaduan->id) }}">Approve</a>

                 
                    <form action="{{ route('pengaduan.destroy',$pengaduan->id) }}" method="POST">
                           @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endforeach