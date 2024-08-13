@extends('layouts-admin')
@section('insertNews')
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
        <h1 class="mb-3">Thêm tin tức</h1>
        <form class="form-control p-5 me-5" method="POST" action="/admin/insertNews" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tên: </label>
                <input type="text" name="name" class="form-control" >
            </div>
            <div class="row mb-3">
                <label for="tencongty" class="col-sm-2 col-form-label">Của công ty: </label>
                
                <select class="form-control" name="tencongty" id="">
                    @foreach($companies as $company)
                        <option class="form-control" value="{{$company->COMPANY_ID}}">{{$company->NAME}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row mb-3">
                <label for="logo">Logo: </label>
                <input class="form-control" name="logo" type="file" accept=".jpg, .png" multiple></input>
            </div>
            <div class="row mb-3">
                <label for="link">Link: </label>
                <input class="form-control" name="link" type="text"></input>
            </div>
            <div class="row mb-3">
                <label for="info">Nội dung tin tức: </label>
                <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</body>
</html>    
@endsection