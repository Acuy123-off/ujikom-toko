<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/dataTables.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="https://cdn.datatables.net/3.1.5/js/dataTables.min.js"></script>
    <title></title>
</head>
<body>
    <div class="container mt-5">
        <a href="" class="btn btn-success">Tambah</a>
        <table class="table" id="tablepemantapan">
        <thead>
            <tr>
                <th>nomor</th>
                <th>foto</th>
                <th>name</th>
                <th>harga</th>
                <th>deskripsi</th>
                <th>qty</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset($p->foto) }}" style="height: 100px" alt=""></td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->harga }}</td>
                <td>{{ $p->deskripsi }}</td>
                <td>{{ $p->qty }}</td>
                <td>
                    <a href="" class="btn btn-warning">Edit</a>
                    <a href="" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
<script >new DataTable('#tablepemantapan');</script>
</html>
