@extends('layouts-admin')
@section('editAccount')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="m-3">Chỉnh sửa thông tin tài khoản</h1>
        @foreach ($user as $item)
            <form action="/admin/editAccount/{{$item->USER_ID}}" class="form-control  p-5 me-5" method="POST">
                @csrf
                <div class="row mb-3 ">
                    <label for="email">Email: </label>
                    <input class="form-control" type="text" name="email" value="{{$item->EMAIL}}" readonly>
                </div>
                <div class="row mb-3">
                    <label for="name">Tên: </label>
                    <input class="form-control" type="text" name="name" value="{{$item->NAME}}">
                </div>
                <div class="row mb-3">
                    <label for="address">Địa chỉ: </label>
                    <input class="form-control" type="text" name="address" value="{{$item->ADDRESS}}">
                </div>
                <div class="row mb-3">
                    <label for="phone">Số điện thoại: </label>
                    <input class="form-control" type="text" name="phone" value="{{$item->PHONE}}">
                </div>
                <button type="submit" class="btn btn-warning">Chỉnh sửa</button>
            </form>
        @endforeach
    </div>
</body>
</html>
@endsection