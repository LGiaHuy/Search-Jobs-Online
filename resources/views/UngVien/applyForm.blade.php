@extends('layouts-info')
@section('applyForm')
<form action="/applyNow/{{$id}}" method="POST" class="m-4 mb-4" enctype="multipart/form-data">
    @csrf
    <div class="p-3">
        <div class="mb-3"><h4>{{$name}}</h4> </div>
        <div class="form-control p-3 mb-3">
            <label for="">Tên</label>
            <input type="text" value="{{auth()->user()->NAME}}" name="name" class="form-control">
        </div>
        <div>
            <h5 class="mb-3">CV của bạn</h5>
            <div class="form-control mb-3 p-3 border border-danger" style="background-color:#fff5f5;">             
                <label class="mb-3" for="">Tải lên CV của bạn</label>
                <input type="file" accept=".pdf, .png, .jpg" name="file_upload" class="form-control w-50 mb-3">
                <text> Tải CV có dạng .pdf .png .jpg</text>
            </div>
        </div>
        <div class="mb-3">
            <h5 class="mb-3">Ghi chú thêm</h5>
            <textarea name="note" id="" cols="30" rows="10" class="border border-secondary w-100" placeholder="Ghi chú thêm cho nhà tuyển dụng">
                Ghi chú thêm cho nhà tuyển dụng
            </textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-danger w-100   ">Gửi CV</button>
        </div>
    </div>
</form>
@endsection