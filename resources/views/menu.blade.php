<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <title>Document</title>
</head>
<body>
    @include('template.nav')
    <div class="row">
        <div class="col-3">
            @foreach ($produk as $p)
            <div class="card">
                <img src="{{ asset('storage/'.$p->foto) }}" alt="" class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">{{ $p->name }}</h4>
                    <p class="card-text">Rp. {{ $p->harga }}</p>
                    <a href="" class="btn btn-warning">detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</html>
