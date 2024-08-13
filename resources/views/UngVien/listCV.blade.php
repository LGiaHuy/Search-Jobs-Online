@extends('layouts-info')
@section('listCV')
<div class="p-3">
    <div class="mb-3">
        <h1>Danh sách công ty đã nộp cv</h1>
    </div>
    <div class="d-flex justify-content-between">
        <div></div>
        <div>
            <i class="fa-solid fa-circle text-danger"></i> Chưa chấp nhận
            <br>
            <i class="fa-solid fa-circle text-success"></i> Đã chấp nhận
        </div>
    </div>
    <hr>
    <table class="table table-striped mt-4">
        <thead>
            <th scope="1">ID công việc</th>
            <th scope="1">Tên đã nộp</th>
            <th scope="1">Thời gian</th>
            <th scope="1">CV</th>
            <th scope="1">Trạng thái</th>
            <th scope="1">Cập nhật</th>
        </thead>
        <tbody>
        @foreach ($applications as $item)
            <tr>
                <td>{{$item->JOB_ID}}</td>
                <td>{{$item->NAME}}</td>
                <td>{{$item->THOIGIAN}}</td>
                <td>{{$item->CV}}</td>
                <td>
                    @if ($item->STATUS == 0)
                    <div class="mx-3">
                        <i class="fa-solid fa-circle text-danger"></i>
                    </div>    
                    @else
                    <div class="mx-3">
                        <i class="fa-solid fa-circle text-success"></i>
                    </div>    
                    @endif
                </td>
                <td>
                    <form action="/deleteCV" method="post">
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
@endsection