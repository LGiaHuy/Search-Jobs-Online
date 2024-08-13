@extends('layouts-info')
@section('verifyEmail')
    <div class="p-3">
        <form action="/verifyEmail" method="post" class="form-control">
            @csrf
            <x-flash-message></x-flash-message>
            <div class="mb-3">
                <h3>Nhập mã xác nhận email</h3>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control w-50" name="code" required>
                <input type="hidden" class="form-control w-50" name="email" value="{{auth()->user()->EMAIL}}">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Xác nhận</button>
            </div>
        </form>
    </div>
@endsection