@extends('layouts-admin')
@section('formUpdate')
<div class="m-3">
    <h1>Mẫu tin đăng bài nhanh</h1>
</div>
<div class="m-3">
    <a href="/NhaTuyenDung/download" >Tải xuống <i class="fa fa-download"></i></a>
</div>
<div class="m-3">
    <h1>Cập nhật mẫu tin đăng bài</h1>
</div>
<div class="m-3">
    <form action="">
        <input type="file" accept=".xlsx" class="form-control w-50 mb-3">
        <button type="submit" class="btn btn-primary"> Cập nhật</button>
    </form> 
</div>
@endsection