@extends('layouts-admin')
@section('Account')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý</title>
</head>
<body>
    <h1 class="m-3">Quản lý tài khoản {{$account}}</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Điện thoại</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày cập nhật</th>
                <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->USER_ID }}</td>
                <td>{{$user->NAME }}</td>
                <td>{{$user->EMAIL}}</td>
                <td>@if($user->GENDER == 0)Nam @else Nữ @endif</td>
                <td>{{$user->ADDRESS }}</td>
                <td>{{$user->PHONE}}</td>
                <td>{{$user->created_at }}</td>
                <td>{{$user->updated_at}}</td>
                <td class="d-flex">
                    <button type="button" class="btn btn-warning mx-1"><a class="text-decoration-none text-white" href="/admin/editAccount/{{$user->USER_ID}}">Sửa</a></button>
                    <form action="/admin/destroyAccount/{{$user->USER_ID}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
          </tbody>
    </table>
    <div>
        <button class="btn btn-primary btn-them"> 
            <a class="text-decoration-none text-white" href="/admin/insertAccount">Thêm</a>
        </button>
    </div>
</body>
</html>
@endsection

