@extends('layouts-NTD')
@section('postJob')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h1 class="m-3">Form đăng tin</h1>
            <form action="/NhaTuyenDung/postJob" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="card p-5">
                        <div class=" mb-3 row">
                            <label for="name">Tên</label>
                            <input type="text" name="name" placeholder="Tên công việc" class="form-control " required>
                        </div>
                        <div class=" mb-3 row">
                            <label for="company">Công ty</label>
                            <input type="text" name="company" placeholder="Tên công ty" class="form-control " required>
                        </div>
                        <div class=" mb-3 row">
                            <label for="email">Email</label>
                            <input type="text" name="email" placeholder="Email công ty" class="form-control " required>
                        </div>
                        <div class=" mb-3 row">
                            <label for="salary">Mức lương $</label>
                            <input type="text" name="salary" placeholder="Mức lương USD" class="form-control " required>
                        </div>
                        <div class=" mb-3 row">
                            <label for="position">Vị trí</label>
                            <input type="text" name="position" placeholder="Vị trí tuyển dụng" class="form-control " required>
                        </div>
                        <div class=" mb-3 row">
                            <label for="ex">Kinh nghiệm</label>
                            <input type="text" name="ex" placeholder="Kinh nghiệm" class="form-control " required>
                        </div>
                        <div class=" mb-3 row">
                            <label for="req">Yêu cầu</label>
                            <input type="text" name="req" placeholder="Tiêu chuẩn" class="form-control " required>
                        </div>
                        <div class=" mb-3 row">
                            <label for="req">Mô tả</label>
                            <input type="text" name="des" placeholder="Mô tả" class="form-control " required>
                        </div>
                        <div class=" mb-3 row">
                            <label for="req">Lợi ích</label>
                            <input type="text" name="ben" placeholder="Lợi ích" class="form-control " required>
                        </div>
                        <div class=" mb-3 row">
                            <label for="time">Thời gian</label>
                            <select name="time" id="" class="form-control" required>
                                <option value="FullTime" class="form-control">FullTime</option>
                                <option value="PartTime" class="form-control">PartTime</option>
                            </select>
                        </div>
                        <div class=" mb-3 row">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" placeholder="Địa chỉ làm việc" class="form-control " required>
                        </div>
                        <div class=" mb-3 row">
                            <label for="logo">Logo</label>
                            <input type="file" accept=".jpg, .png" name="file_upload" class="form-control " >
                        </div>
                        <div class=" mb-3 row">
                            <label for="link">Link</label>
                            <input type="text" placeholder="đường dẫn" name="link" class="form-control " required>
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection