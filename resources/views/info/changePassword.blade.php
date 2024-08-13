@extends('layouts-info')
@section('changePassword')
<div class="container-fluid">
    <div class="card">
        <div class="card-body ">
            <h1 class="m-3">Đổi mật khẩu </h1>
            <form action="/doiMatKhau" method="post">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger w-50">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- <div class="mb-3 w-50">
                <label for="">Email</label>
                <input type="text" class="form-control" value="{{$user->EMAIL}}" readonly>
            </div> --}}
            <div class="mb-3  w-50">
                <label for="">Mật khẩu:</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3 w-50">
                <label for="">Xác nhận mật khẩu:</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection