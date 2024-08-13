@extends('layouts-NTD')
@section('downloadFormPage')
<?php
    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Worksheet\SheetView;

    require_once "Query.php";
    $query = new Query();

?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                {{-- @if(session('error'))
                    <x-flash-message type="error">{{ session('error') }}</x-flash-message>
                @endif --}}
                @if(session('success'))
                    <x-flash-message type="massage">{{ session('massage') }}</x-flash-message>
                @endif
                <h1 class="m-3">
                    Download mẫu tin tuyển dụng
                </h1>
                <div class="m-3">
                    <a href="/NhaTuyenDung/taixuong" >Tải xuống <i class="ti ti-download"></i></a>
                </div>
                <div class="m-3 mt-5">
                    <h4>Hướng dẫn sử dụng:</h4>
                    <div>
                        <img src="/images/exPostJob.png" width="100%" alt="">
                    </div>
                    <h4 class="mt-3">Mô tả:</h4>
                    <ul class="mx-3">
                        <li>Tên công việc: Ghi tên công việc muốn tuyển dụng</li>
                        <li>Tên công ty: Điền tên công ty tuyển dụng</li>
                        <li>Mức lương: Điền mức lương có thể khoảng hoặc chính xác (USD)</li>
                        <li>Vị trí: Điền vị trí muốn tuyển dụng</li>
                        <li>Kinh nghiệm: Yêu cầu kinh nghiệm</li>
                        <li>Yêu cầu: Yêu cầu ứng tuyển</li>
                        <li>Mô tả công việc: Mô tả công việc cần làm</li>
                        <li>Lợi ích: Lợi ích khi làm việc</li>
                        <li>Thời gian: Thời gian làm việc FullTime/PartTime</li>
                        <li>Địa chỉ: Địa chỉ làm việc</li>
                        <li>Link: Đường dẫn tới website doanh nghiệp</li>
                        <li>Email: Địa chỉ email của nhà tuyển dụng</li>
                    </ul>
                </div>
                <div class="m-3 mt-5">
                    <form action="/NhaTuyenDung/uploadJobData" method="post" enctype="multipart/form-data">
                    @csrf
                        <h1 class="my-3">Upload tin tuyển dụng</h1>
                        <div class="my-3">
                            <label for="">Upload file .xlsx tại đây</label>
                            <input type="file" accept=".xlsx" name="file" class="form-control w-50">
                        </div>
                        <div>
                            <button type="submit" name="import" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
<?php
    
?>
@endsection