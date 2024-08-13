@extends('layouts-NTD')
@section('listUV')
<div class="container-fluid">
    <div class="card">
        <x-flash-message></x-flash-message>
        <div class="card-body">
            <h1 class="m-3 mb-5">Danh sách công việc được ứng tuyển</h1>
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <th scope='1'>ID công việc</th>
                    <th scope='1'>Tên công việc</th>
                    <th scope='1'>Thời gian đăng bài</th>
                    <th scope='1'></th>
                </thead>
                <tbody>
                @foreach ($jobs as $item)
                    <tr>
                        <td>{{$item->JOB_ID}}</td>
                        <td>{{$item->NAME}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            <a href="/NhaTuyenDung/listCV/{{$item->JOB_ID}}" class="btn btn-success">Chi tiết</a>
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