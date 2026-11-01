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
    <div class="container mt-5 justify-content-center d-flex align-items-center">
    <form action="{{ route('postregisterview') }}" method="POST" class="form-group">
        @csrf
        <label>Nama</label>
        <input name="name" type="text" class="form-control">

        <label>username/email</label>
        <input name="email" type="email" class="form-control">

        <label>password</label>
        <input name="password" type="password" class="form-control">

        <a href="{{ route('loginview') }}" class="btn btn-primary">LOGIN</a>
        <button type="submit" class="btn btn-secondary">REGISTER</button>
    </form>
    </div>
</body>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</html>
