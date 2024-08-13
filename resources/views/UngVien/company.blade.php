@extends('layouts.app')
@section('company')
<div class="my-3">
    <div class="text-center mb-3">
        <h1>Danh sách công ty thành viên</h1>
    </div>
    <div class="d-flex justify-content-center mb-3">
        <hr class="w-75 text-black">
    </div>
    <div class="container">
        <div class="row justify-content-between">
            @foreach ($companies as $item)
            <div class="col-sm-3 card mx-1 mb-2 khung" >
                <div>
                    <img src="/logo.jpg" class="hinh-nen" alt="">
                </div>
                <div class="rounded logo-cong-ty position-absolute">
                    <img src="/images/{{$item->LOGO}}" class="cover-image"  alt="" style="">
                </div>
                <div class="mb-2 mt-4">
                    <h4>{{$item->NAME}}</h4>
                </div>
                <div class="overflow-hidden info-company mb-3" >
                    {{$item->INFO}} 
                </div>
          </div>
          @endforeach
        </div>
    </div>
</div>
@endsection