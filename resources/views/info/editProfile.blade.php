@extends('layouts-info')
@section('editProfile')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h1 class="m-3">Cập nhật thông tin</h1>
            <div class="card">
                <div class="card-body">
                    <form action="/editProfile" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Tên</label>
                            <input type="text" value="{{$user->NAME}}" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Đia chỉ</label>
                            <input type="text" value="{{$user->ADDRESS}}" name="address" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Điện thoại</label>
                            <input type="text" value="{{$user->PHONE}}" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Công ty</label>
                            <select name="company"  class="form-control"  id="">
                                @foreach ($com as $item)
                                    <option class="form-control" value="{{$item->ID}}">{{$item->NAME}}</option>
                                @endforeach
                            </select>   
                        </div>
                        <div class="mb-3">
                            <label for="">Avatar</label>
                            <input type="file" accept=".jpg, .png" multiple value="" name="file_upload" class="form-control">
                            <input type="hidden" name="avatardb" value="{{$user->AVATAR}}">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-warning">Cập nhật</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection