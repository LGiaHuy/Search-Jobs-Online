@extends('layouts-info')
@section('profile')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h1 class="m-3">Thông tin cá nhân</h1>
            <div class="card">
                <x-flash-message></x-flash-message>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="name">ID</label>
                                <h4>{{$user->USER_ID}}</h4>
                            </div>
                            <div class="mb-3">
                                <label for="name">Tên</label>
                                <h4>{{$user->NAME}}</h4>
                            </div>
                            <div class="mb-3">
                                <label for="company">Công ty</label>
                                <h4>{{$company}}</h4>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <h4>{{$user->EMAIL}}</h4>
                            </div>
                            <div class="mb-3">
                                <label for="address">Địa chỉ</label>
                                <h4>{{$user->ADDRESS}}</h4>
                            </div>
                            <div class="mb-3">
                                <label for="phone">Số điện thoại</label>
                                <h4>{{$user->PHONE}}</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="logo">Avatar</label>
                                <div>
                                    <img src="/uploadAvatar/{{$user->AVATAR}}" alt="" width="200px" height="200px"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-warning">
                            <a href="/editProfile" class="text-decoration-none text-white">Cập nhật</a>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection