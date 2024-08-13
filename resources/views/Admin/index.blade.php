@extends('layouts-admin')
@section('admin')
<div class="card">
    <div class="card-body">
        <h1>Thống kê</h1>
        <div class="row my-5">
            <div class="col-5 mx-5 p-5 text-center card"  onclick="location.href = '/admin/listCompany'">
                <h1>{{$count[0]}}</h1>
                <h3>Số công ty thành viên</h3>
            </div>
            <div class="col-5 mx-5 p-5 text-center card"  onclick="location.href = '/admin/listNews'">
                <h1>{{$count[1]}}</h1>
                <h3>Số bài tin tức</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-5 mx-5  p-5 text-center card"   onclick="location.href = '/admin/listJobs'">
                <h1>{{$count[2]}}</h1>
                <h3>Bài tuyển dụng</h3>
            </div>
            <div class="col-5 mx-5 p-5 text-center card"   onclick="location.href = '/admin/listJobsWait'">
                <h1>{{$count[3]}}</h1>
                <h3>Bài chờ duyệt</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-5 mx-5 p-5 text-center card"   onclick="location.href = '/admin/listAccountNTD'">
                <h1>{{$count[4]}}</h1>
                <h3>Tài khoản Nhà Tuyển Dụng</h3>
            </div>
            <div class="col-5 mx-5 p-5 text-center card"   onclick="location.href = '/admin/listAccountNTD'">
                <h1>{{$count[5]}}</h1>
                <h3>Tài khoản ứng viên</h3>
            </div>
        </div>
        
    </div>
</div>
@endsection