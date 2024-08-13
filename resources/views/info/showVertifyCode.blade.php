@extends('layouts-info')
@section('showVerify')
    <div class="p-3">
        <form action="/vertifyCode" method="post" class="form-control">
            @csrf
            <x-flash-message></x-flash-message>
            <div class="mb-3">
                <h1>Nhập mã xác nhận</h1>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control w-50" name="code" required>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Xác nhận</button>
            </div>
        </form>
    </div>
@endsection