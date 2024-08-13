@extends('layouts-admin')
@section('insertAccount')
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
        <h1 class="m-3">Thêm tài khoản</h1>
        <form class="form-control p-5 me-5" action="/admin/insertAccount" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="name">Tên: </label>
                <input type="text" name="name" class="form-control" placeholder="Họ và tên" required>
            </div>
            <div class="row mb-3">
                <label for="email">Email: </label>
                <input type="text" name="email" class="form-control" placeholder="Địa chỉ email" required>
            </div>
            <div class="row mb-3">
                <label for="password">Mật khẩu: </label>
                <input type="text" name="password" class="form-control" placeholder="Nhập mật khẩu" required> 
            </div>
            <div class="row mb-3">
                <label for="loai">Loại tài khoản: </label>
                <select name="loai" class="form-control" required>
                    <option value="UV">Ứng viên</option>
                    <option value="NTD">Nhà tuyển dụng</option>
                </select>
            </div>
            <button class="btn btn-primary mt-3" type="submit">Thêm</button>
        </form>    

    </div>
</body>
</html>
@endsection