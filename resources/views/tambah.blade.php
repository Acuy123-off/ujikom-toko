<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <title>Tambah Menu</title>
</head>
<body>
    <div class="container mt-5 justify-content-center d-flex align-items-center">
    <form action="{{ route('posttambah') }}" method="POST" class="form-group" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input name="name" type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input name="harga" type="number" class="form-control">
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input name="qty" type="number" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <input name="deskripsi" type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input name="foto" type="file" accept="image/*" class="form-control">
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control">
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->name }}</option>
                @endforeach
            </select>
        </div>

        <a href="{{ route('adminview') }}" class="btn btn-secondary">Batalkan</a>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $item)
        <p>{{ $item }}</p>
        @endforeach
    </div>

    @endif
    </div>
</body>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</html>
