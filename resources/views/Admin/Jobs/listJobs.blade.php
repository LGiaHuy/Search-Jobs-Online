@extends('layouts-admin')
@section('listJobs')
<div class="m-3">
    <div class="mb-3">
        <h1>Danh sách {{$title}}</h1>
    </div>
    <div>
        <table class="table table-striped">
            <thead>
                <th col='1'>#</th>
                <th col='1'>Id NTD</th>
                <th col='1'>Tên công việc</th>
                <th col='1'>Tên công ty</th>
                <th col='1'>Lương</th>
                <th col='1'>Thời gian</th>
                <th col='1'>Vị trí</th>
                <th col='1'>Kinh nghiệm</th>
                <th col='1'>Địa chỉ</th>
                <th col='1'>Link</th>
                <th col='1'>Yêu cầu</th>
                <th col='1'></th>
            </thead>
            <tbody>
                @foreach ($jobs as $item)
                <tr>
                    <td>{{$item->JOB_ID}}</td>
                    <td>{{$item->USER_ID}}</td>
                    <td>{{$item->NAME}}</td>
                    <td>{{$item->COMPANY}}</td>
                    <td>{{$item->SALARY}}</td>
                    <td>{{$item->TIME}}</td>
                    <td>{{$item->POSITION}}</td>
                    <td>{{$item->EXPERIENCE}}</td>
                    <td>{{$item->ADDRESS}}</td>
                    <td style="max-width: 130px" class="overflow-hidden"><a href="{{$item->LINK}}">{{$item->LINK}}</a></td>
                    <td>{{$item->REQUIREMENTS}}</td>
                    <td>
                        @if ($item->STATUS == 1)
                        <form action="/admin/deleteJob/{{$item->JOB_ID}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" >Xóa</button>
                        </form>
                        @else
                            <button class="btn btn-success mx-1"><a href="/admin/acceptJob/{{$item->JOB_ID}}" class="nav-item text-decoration-none text-white">Duyệt</a></button>
                            <form action="/admin/deleteJob/{{$item->JOB_ID}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" >Không duyệt</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection