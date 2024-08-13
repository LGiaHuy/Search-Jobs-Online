@extends('layouts-admin')
@section('editNews')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="mb-3">Chỉnh sửa tin tức</h1>
        @foreach($news as $item)
        <form class="form-control p-5 me-5" method="POST" action="/admin/editNews/{{$item->NEWS_ID}}">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Tên: </label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{$item->NAME}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="link" class="col-sm-2 col-form-label">Đường dẫn: </label>
                <div class="col-sm-10">
                    <input type="text" name="link" class="form-control" value="{{$item->LINK}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="content">Nội dung tin tức: </label>
                <textarea class="form-control" name="content" id="" cols="30" rows="10">{{$item->CONTENT}}</textarea>
            </div>
            <div class="row mb-3">
                <label for="logo">Logo: </label>
                <input type="hidden" name="lg" value="{{$item->LOGO}}">
                <input class="form-control" name="logo" type="file" accept=".jpg, .png" multiple></input>
            </div>
            <button type="submit" class="btn btn-warning">Chỉnh sửa</button>
          </form>
          @endforeach
    </div>
</body>
</html>    
@endsection