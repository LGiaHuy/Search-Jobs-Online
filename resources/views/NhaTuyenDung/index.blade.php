@extends('layouts-NTD')
@section('NTD')
<div class="container-fluid">
  <div class="card">
    <x-flash-message></x-flash-message>
    <div class="card-body">
      <div class="row my-5">
        <div class="col-4">
          <div class="text-center">
            <h1>{{$quantityJobs}}</h1>
            <h3>Bài đã đăng</h3>
          </div>
         
        </div>
        <div class="col-4">
          <div class="text-center">
            <h1>{{$quantityJobsWait}}</h1>
            <h3>Bài chờ duyệt</h3>
          </div>
          
        </div>
        <div class="col-4">
          <div class="text-center">
            <h1>{{$count}}</h1>
            <h3>Ứng viên đã nộp</h3>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection