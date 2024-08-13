@extends('layouts.app')
@section('detailJob')
<div class="row mb-3">
    <div class="col-1"></div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div>
                    <h4>{{$job->NAME}}</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <i class="fa-solid fa-money-check-dollar fs-6 mx-1 text-success"></i>Mức lương
                        <h5 class="mx-2 mt-2">{{$job->SALARY}} USD</h5>
                    </div>
                    <div class="col-4">
                        <i class="fa-solid fa-crosshairs fs-6 mx-1 text-success"></i> Vị trí
                        <h5 class="mx-2 mt-2">{{$job->POSITION}}</h5>
                    </div>
                    <div class="col-4">
                        <i class="fa-solid fa-hourglass-half fs-6 mx-1 text-success"></i>Kinh nghiệm
                        <h5 class="mx-2 mt-2">{{$job->EXPERIENCE}} </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <h4>Người đăng bài </h4>
                </div>
                <div>
                    <div class="d-flex mb-2">
                        <h5 class="mx-1">ID:   {{$user->USER_ID}}</h5> 
                    </div>
                    <div class="d-flex mb-2">
                        <h5 class="mx-1">Tên:   {{$user->NAME}}</h5> 
                    </div>
                    <div class="d-flex mb-2">
                        <h5 class="mx-1">Công ty:   {{$company->NAME}}</h5> 
                    </div>
                    <div class="d-flex mb-2">
                        <h5 class="mx-1">Email:   {{$user->EMAIL}}</h5> 
                    </div> 
                    <div class="d-flex mb-2">
                        <h5 class="mx-1">Điện thoại:   {{$user->PHONE}}</h5> 
                    </div>
                    <div class="d-flex mb-2">
                        <h5 class="mx-1">Địa chỉ:   {{$user->ADDRESS}}</h5> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1">

    </div>
    <div class="col-1"></div>
    <div class="col-6" style="margin-top:-100px">
        <div class="card">
            <div class="card-body">
                <div>
                    <h4>Chi tiết bài tuyển dụng</h4>
                </div>
                <div class="mb-2">
                    <hr>
                </div>
                <div class="mb-2">
                    <h5 class="mb-2">Mô tả công việc</h5>
                    {{$job->DESCRIPTIONS}}
                </div>
                <div class="mb-2">
                    <h5 class="mb-1" style="line-height: 1.6">Yêu cầu ứng viên</h5>
                    {{$job->REQUIREMENTS}}
                </div>
                <div class="mb-3">
                    <h5 class="mb-1">Quyền lợi</h5>
                    {{$job->BENEFIT}}
                </div>
                <div class="mb-3">
                    <div class="mb-2">
                        <h5 class=""> Công ty: </h5> {{$job->COMPANY}}
                    </div>
                    <div class=" mb-2">
                        <h5 class=""> Thời gian: </h5> {{$job->TIME}}
                    </div>
                    <div class=" mb-2">
                        <h5 class=""> Địa điểm làm việc: </h5> {{$job->ADDRESS}}
                    </div>
                    <div class="mb-2">
                        <h5 class="">Link: </h5><a href="{{$job->LINK}}">{{$job->LINK}}</a> 
                    </div>
                </div>
                <div class="mb-2">
                    <h5 class="mb-1">Cách thức ứng tuyển</h5>
                    <div class="d-flex">
                        <button class="btn btn-success mx-1"><a class="text-black" href="/applyNow/{{$job->JOB_ID}}">Ứng tuyển ngay</a></button>
                        {{-- <button class="btn btn-secondary"><a class="text-white" href="">Lưu tin</a></button> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card p-3 mt-3">
            <h5 class="mb-1">Logo công ty</h5>
            <img src="/uploadLogo/{{$job->LOGO}}" alt="">
        </div>
    </div>
</div>
@endsection