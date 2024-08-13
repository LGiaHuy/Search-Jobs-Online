@extends('layouts.app')
@section('search')
<form action="/timKiem" method="GET">
  <div class="mb-5" style="margin-top: -200px; min-height:200px">
    <div class="d-flex justify-content-center">
      <input type="text" name="search" class="form-control w-50" style="height: 50px" placeholder="Tìm kiếm công việc">
      <button class="btn btn-primary" type="submit">Tìm kiếm</button>
    </div>
  </div>
</form>
  <div class="contaner my-5">
    <div class="row">
      <div class="col-1"></div>
      <div class="col-6">
        <h4 class="mb-3">Kết quả tìm kiếm '{{$search}}'</h4>
        @foreach ($jobs as $item)
        <div id="job" class="form-control job mb-1" onclick="location.href = '/detailJob/{{$item->JOB_ID}}'">
          <div class="card-body">
            <div class="row">
              <div class="col-3 my-1">
                <img src="/uploadLogo/{{$item->LOGO}}" width="150px" height="150px" class="rounded" alt="">
              </div>
              <div class="col-9 my-1">
                <div class="d-flex justify-content-between ">
                  <div class="overflow-hidden" style="height: 26px; width:400px">
                    <h5 >{{$item->NAME}}</h5>
                  </div>
                  <div class="d-flex">
                    <label  class="mx-1">Lương: </label>
                    <h5> {{$item->SALARY}}USD</h5>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-6">
                    <div class="d-flex noi-dung mb-1">
                      <h6>Công ty:{{$item->COMPANY}}</h6>
                    </div>
                    <div class="d-flex noi-dung mb-1">
                      <h6>Thời gian:{{$item->TIME}}</h6>
                    </div>
                    <div class="d-flex noi-dung mb-1">
                      <h6>Vị trí:{{$item->POSITION}}</h6>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="d-flex noi-dung mb-1">
                      <h6>Kinh nghiệm:{{$item->EXPERIENCE}}	</h6>
                    </div>
                    <div class="d-flex noi-dung mb-1">
                      <h6>Địa chỉ:{{$item->ADDRESS}}</h6>
                    </div>
                    <a href="/detailJob">Chi tiết</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
      <div class="col-4">
        <div class="form-control">
          <div class="card-body">
            <h4 class="m-3">All filter</h4>
            <hr>
            <div class="mx-3">
              <label for="">Thời gian</label>
              <div class="d-flex justify-content-center">
                <hr class="w-75 " >
              </div>
              <form action="/timKiem/time" method="GET" id="searchTimeForm" class="d-flex justify-content-between">
                <div>
                    @if ($search=='FullTime')
                    <input type="radio" id="myCheckbox" name="time" value="FullTime" checked>
                    @else
                    <input type="radio" id="myCheckbox" name="time" value="FullTime">
                    @endif
                  <span>FullTime</span> 
                </div>  
                <div>
                    @if ($search=='PartTime')
                    <input type="radio"id="myCheckbox1" name="time" value="PartTime" checked>
                    @else
                    <input type="radio"id="myCheckbox1" name="time" value="PartTime">
                    @endif
                  <span>PartTime</span>
                </div>
                <div><span></span></div>
                <div><span></span></div>
              </form>
            </div>
            <div class="m-3">
              <label for="">Kinh nghiệm</label>
              <div class="d-flex justify-content-center">
                <hr class="w-75 " >
              </div>
              
              <div class="d-flex justify-content-between">
                <div><input type="checkbox" name="ex" value="1" id=""> <span><1</span> </div>
                <div><input type="checkbox" name="ex" value="3" id=""> <span><3</span></div>
                <div><input type="checkbox" name="ex" value="3" id=""> <span><5</span></div>
              </div>
            </div>
  
            <div class="m-3">
                <label for="">Lương thấp nhất</label>
                <div class="d-flex justify-content-center">
                  <hr class="w-75 " >
                </div>
                <form action="/timKiem/Salary" id="searchSalary" method="post">
                  @csrf
                  <div class="d-flex justify-content-between">
                    <input type="range" id="volume" class="form-control w-75" value="50" name="salary" min="0" max="5000">
                    <span id="volume-value" style="display: inline-block; "></span>USD
                  </div>
                </form>
              </div>
  
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
  // Lắng nghe sự kiện khi giá trị của input range thay đổi
  document.getElementById('volume').addEventListener('input', function() {
    // Lấy giá trị hiện tại của input range
    var value = this.value;
    // Hiển thị giá trị lên trang
    document.getElementById('volume-value').textContent = value;
  });
document.addEventListener('DOMContentLoaded', function () {
    // Lắng nghe sự kiện onchange của checkbox
    var radioButtons = document.querySelectorAll('input[type="radio"]');
    radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('change', function () {
            // Gửi form khi một radio button được chọn
            document.getElementById('searchFilter').submit();
        });
    });
    var inputRange = document.getElementById('volume');
    inputRange.addEventListener('change', function () {
        // Gửi form khi giá trị của input range thay đổi
        document.getElementById('searchFilter').submit();
    });
});


</script>
@endsection


