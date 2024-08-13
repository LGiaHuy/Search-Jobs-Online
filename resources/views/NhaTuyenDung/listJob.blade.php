@extends('layouts-NTD')
@section('listJob')
<div class="container-fluid">
    <div class="card">
        <x-flash-message></x-flash-message>
        <div class="card-body">
            <h1 class="m-3">{{$title}}</h1>
        <div class="container">
            <table class="table table-striped form-control">
                <thead >
                    <th scope="1">#</th>
                    <th scope="1">Tên</th>
                    <th scope="1">Công ty</th>
                    {{-- <th scope="1">Lương</th>
                    <th scope="1">Vị trí</th>
                    <th scope="1">Kinh nghiệm</th>
                    <th scope="1">Yêu cầu</th>
                    <th scope="1">Thời gian</th>
                    <th scope="1">Địa chỉ</th> --}}
                    <th scope="1">Đường dẫn</th>
                    <th scope="1"></th>
                </thead>
                <tbody  >
                @foreach ($jobs as $item)
                    <tr class="overflow-auto" style="width=100%">
                        <td>{{$item->JOB_ID}}</td>
                        <td>{{$item->NAME}}</td>
                        <td>{{$item->COMPANY}}</td>
                        {{-- <td>{{$item->SALARY}}</td>
                        <td>{{$item->POSITION}}</td>
                        <td>{{$item->EXPERIENCE}}</td>
                        <td>{{$item->REQUIREMENTS}}</td>
                        <td>{{$item->TIME}}</td>
                        <td>{{$item->ADDRESS}}</td> --}}
                        <td><a href="{{$item->LINK}}">{{$item->LINK}}</a></td>
                        <td >    
                            @if ($item->STATUS == 1)
                            <a href="/detailJob/{{$item->JOB_ID}}" class="btn btn-success">Chi tiết</a>                               
                            @else
                            <a href="/NhaTuyenDung/editJob/{{$item->JOB_ID}}" class="btn btn-warning">Sửa</a>   
                            @endif
                            
                            <form action="/NhaTuyenDung/destroyJob/{{$item->JOB_ID}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Xóa</button>
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