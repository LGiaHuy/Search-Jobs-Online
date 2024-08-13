@extends('layouts-info')
@section('forgotPassword')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <h1>Quên mật khẩu</h1>
            </div>  
            <hr>
            <div class="mb-3">
            <form action="/quenMatKhau" method="post" class="form-control p-3">
                @csrf
                <label>Nhập email để nhận mật khẩu mới</label>
                <input type="text" name="email" class="form-control w-50 mb-3" required placeholder="email">
                <button class="btn btn-primary mb-3" type="submit">Gửi mật khẩu mới</button>
                <br>
                <a href="/login">Đăng nhập</a>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection