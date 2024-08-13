@extends('layouts-admin')
@section('getListNews')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Danh mục tin tức</h1>
    <table class="table table-striped form-control">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Logo</th>
                <th scope="col">Link</th>
                <th scope="col">Nội dung</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $item)
            <tr>
                <td>{{$item->NEWS_ID}}</td>
                <td>{{$item->NAME}}</td>
                <td>{{$item->LOGO}}</td>
                <td><a href="{{$item->LINK}}">{{$item->LINK}}</a></td>
                <td>{{$item->CONTENT}}</td>
                <td>
                    <button type="submit" class="btn btn-warning mb-1"> <a class="text-decoration-none text-white" href="/admin/editNews/{{$item->NEWS_ID}}">Sửa</a></button> 
                    <form action="/admin/destroyNews/{{$item->NEWS_ID}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <button class="btn btn-primary btn-them"> 
            <a class="text-decoration-none text-white" href="/admin/insertNews">Thêm</a>
        </button>
    </div>
</body>
</html>    
@endsection