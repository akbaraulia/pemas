<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Bukti Pengaduan</title>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    table td, table th {
        border: 1px solid black;
        padding: 5px;
    }

    </style>
</head>
<body>
    <h3 align="center">Laporan Hasil Pengaduan</h3>
    <table class="table align-items-center mt-4 mb-0">
        <thead>
            <tr>
                <th>No</th>
                <th>Tgl Pengaduan</th>
                <th>NIK</th>
                <th>Name</th>
                <th>Status</th>
                <th>Isi Laporan</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no= 1;
            ?>
            @foreach ($history as $item)
            <?php
                $data_user = DB::table('users')->where('id', $item->user_id )->get();
                $data_petugas = DB::table('tanggapans')->where('id_pengaduan', $item->id )->get();
            ?>
            <tr>
                <td><?= $no++ ?></td>
               
                <td>{{ $item->tgl_pengaduan }}</td>
                @foreach ($data_user as $user)
                    <td><?= $user->nik  ?></td>
                    <td><?= $user->name  ?></td>
                @endforeach
                <td>{{ $item->status }}</td>
                <td>{{ $item->isi_laporan }}</td>
            @endforeach
        </tbody>
    </table>
</body>
</html>