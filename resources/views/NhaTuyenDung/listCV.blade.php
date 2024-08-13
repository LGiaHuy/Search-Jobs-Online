@extends('layouts-NTD')
@section('listCV')
<div class="container-fluid">
    <div class="card">
        <x-flash-message></x-flash-message>
        <div class="card-body">
            <div>
                <h2 class="mb-3">{{$job->NAME}}</h2>
                <h3 class="mb-3">Danh sách CV</h3>
            </div>
            <div>
                <table class="table table-striped">
                    <thead>
                        <th scope="1">ID Ứng viên</th>
                        <th scope="1">Tên ứng viên</th>
                        <th scope="1">Thời gian ứng tuyển</th>
                        <th scope="1">Ghi chú</th>
                        <th scope="1">CV</th>
                        <th scope="1"></th>
                    </thead>
                    <tbody>
                    @foreach ($applications as $item)
                        <tr>
                            <td>{{$item->USER_ID}}</td>
                            <td>{{$item->NAME}}</td>
                            <td>{{$item->THOIGIAN}}</td>
                            <td>{{$item->NOTE}}</td>
                            <td>
                                <a href="/NhaTuyenDung/downloadCV/?userid={{$item->USER_ID}}&jobid={{$item->JOB_ID}}">tải xuống
                                <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="d-flex">
                                <form action="/NhaTuyenDung/acceptCV" method="post">
                                    @csrf
                                    <input type="hidden" name="userid" value="{{$item->USER_ID}}">
                                    <input type="hidden" name="jobid" value="{{$item->JOB_ID}}">
                                    <button type="submit" class="btn btn-success">Chấp nhận</button>
                                </form>
                                <form action="/NhaTuyenDung/deleteCVNTD" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="userid" value="{{$item->USER_ID}}">
                                    <input type="hidden" name="jobid" value="{{$item->JOB_ID}}">
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection