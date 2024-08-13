@extends('layouts-admin')
@section('editCompany')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1>Chỉnh sửa thông tin công ty </h1>
        @foreach ($companies as $company)
        <form class="form-control p-5 me-5" method="POST" action="/admin/editCompany/{{$company->COMPANY_ID}}">
            {{-- @method('PATCH') --}}
            @csrf
            <div class="row mb-3">
                <label for="inputID" class="col-sm-2 col-form-label">ID: </label>
                <div class="col-sm-10">
                    <input type="text" name="id" class="form-control" value="{{$company->COMPANY_ID}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputName" class="col-sm-2 col-form-label">Name: </label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{$company->NAME}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="slogan" class="col-sm-2 col-form-label">Slogan: </label>
                <div class="col-sm-10">
                    <input type="text" name="slogan" class="form-control" value="{{$company->SLOGAN}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="info">Mô tả chung về công ty: </label>
                <textarea class="form-control" name="info" id="" cols="30" rows="10" value="">{{$company->INFO}}</textarea>
            </div>
            <div class="row mb-3">
                <label for="address">Địa chỉ: </label>
                <input class="form-control" name="address" type="text" value="{{$company->ADDRESS}}"></input>
            </div>
            <div class="row mb-3">
                <label for="phone">Liên hệ: </label>
                <input class="form-control" name="phone" type="text" value="{{$company->PHONE}}"></input>
            </div>
            <div class="row mb-3">
                <label for="logo">Logo: </label>
                {{-- <img src="{{$companies->LOGO}}" alt="logo"> --}}
                <input type="hidden" value="{{$company->LOGO}}" name="lg">
                <input class="form-control" name="logo" type="file" accept=".jpg, .png" multiple></input>
            </div>
            <div class="row mb-3">
                <label for="link">Link: </label>
                <input class="form-control" name="link" type="text" value="{{$company->LINK}}"></input>
            </div>
            <button type="submit" class="btn btn-warning">Chỉnh sửa</button>
          </form>
        @endforeach
    </body>
    </html>
@endsection