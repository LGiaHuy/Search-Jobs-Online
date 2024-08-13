@extends('layouts-admin')
@section('insertCompany')
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
            <h1 class="mb-3">Thêm công ty</h1>
            <form class="form-control p-5 me-5" method="POST" action="/admin/insertCompany">
                @csrf
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name: </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="slogan" class="col-sm-2 col-form-label">Slogan: </label>
                    <div class="col-sm-10">
                        <input type="text" name="slogan" class="form-control" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="info">Mô tả chung về công ty: </label>
                    <textarea class="form-control" name="info" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="row mb-3">
                    <label for="address">Địa chỉ: </label>
                    <input class="form-control" name="address" type="text"></input>
                </div>
                <div class="row mb-3">
                    <label for="phone">Liên hệ: </label>
                    <input class="form-control" name="phone" type="text"></input>
                </div>
                <div class="row mb-3">
                    <label for="logo">Logo: </label>
                    <input class="form-control" name="logo" type="file" accept=".jpg, .png" multiple></input>
                </div>
                <div class="row mb-3">
                    <label for="link">Link: </label>
                    <input class="form-control" name="link" type="text"></input>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
              </form>
        </div>
        
    </body>
    </html>
@endsection