@extends('layouts-admin')
@section('getListCompany')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1 class="mb-3">Danh mục công ty</h1>
        <table class="table table-striped form-control">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Slogan</th>
                    <th scope="col">Giới thiệu</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Điện thoại</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Link</th>
                    <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($companies as $company)
                <tr>
                    <td>{{$company->COMPANY_ID }}</td>
                    <td>{{$company->NAME }}</td>
                    <td>{{$company->SLOGAN}}</td>
                    <td>{{$company->INFO }}</td>
                    <td>{{$company->ADDRESS}}</td>
                    <td>{{$company->PHONE }}</td>
                    <td>{{$company->LOGO}}</td>
                    <td><a href="{{$company->LINK}}">{{$company->LINK}}</a></td>
                    <td >
                        <button type="submit" class="btn btn-warning mb-1"> <a class="text-decoration-none text-white" href="/admin/editCompany/{{$company->COMPANY_ID}}">Sửa</a></button> 
                        <form action="/admin/destroy/{{$company->COMPANY_ID}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" >Xóa</button>
                        </form>
                    </td>
                </tr>

                @endforeach
              </tbody>
        </table>
        <div>
            <button class="btn btn-primary btn-them"> 
                <a class="text-decoration-none text-white" href="/admin/insertCompany">Thêm</a>
            </button>
        </div>
    </body>
    </html>
    
@endsection