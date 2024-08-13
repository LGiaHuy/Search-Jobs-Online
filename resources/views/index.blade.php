@extends('layouts.app')
@section('content')
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

        <nav aria-label="Page navigation example"  class="d-flex justify-content-center">
          <!-- Hiển thị các nút chuyển trang -->
          <ul class="pagination">
            @if ($jobs->currentPage() > 1)
              <li class="page-item">  <a class="page-link" href="{{ $jobs->previousPageUrl() }}" class=" btn btn-light">Previous</a></li>
            @endif
            
            @for ($i = 1; $i <= $jobs->lastPage(); $i++)
              <li class="page-item">  <a class="page-link" href="{{ $jobs->url($i) }}">{{ $i }}</a></li>
            @endfor
            
            @if ($jobs->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $jobs->nextPageUrl() }}">Next</a></li>
            @endif
          </ul>
        </nav>
        
      </div>
      <div class="col-4">
        <div class="form-control">
          <form action="/timKiem/filter" method="GET" id="searchTimeForm" >

          <div class="card-body">
            <h4 class="m-3">All filter</h4>
            <hr>
            <div class="mx-3">
              <label for="">Thời gian</label>
              <div class="d-flex justify-content-center">
                <hr class="w-75 " >
              </div>
              <div class="d-flex justify-content-between">

                  <div>
                    @if ($search[0] == 'FullTime')
                    <input type="radio" id="myCheckbox" name="time" value="FullTime" checked>
                    @else
                    <input type="radio" id="myCheckbox" name="time" value="FullTime">
                    @endif
                    
                    <span>FullTime</span> 
                  </div>  
                  <div>
                    @if ($search[0] == 'PartTime')
                    <input type="radio"id="myCheckbox1" name="time" value="PartTime" checked>
                    @else
                    <input type="radio"id="myCheckbox1" name="time" value="PartTime">
                    @endif
                    <span>PartTime</span>
                  </div>
                  <div><span></span></div>
                  <div><span></span></div>

              </div>
            </div>
            <div class="m-3">
              <label for="">Kinh nghiệm</label>
              <div class="d-flex justify-content-center">
                <hr class="w-75 " >
              </div>
                <div class="d-flex justify-content-between">
                  <div>
                    @if ($search[1]==1)
                    <input type="checkbox" name="ex" value="1" id="one" checked> 
                    @else
                    <input type="checkbox" name="ex" value="1" id="one"> 
                    @endif
                    <span><1</span> 
                  </div>
                  <div>
                    @if ($search[1]==3)
                    <input type="checkbox" name="ex" value="3" id="three" checked> 
                    @else
                    <input type="checkbox" name="ex" value="3" id="three"> 
                    @endif
                    <span><3</span>
                  </div>
                  <div>
                    @if ($search[1]==5)
                    <input type="checkbox" name="ex" value="5" id="five" checked> 
                    @else
                    <input type="checkbox" name="ex" value="5" id="five"> 
                    @endif
                    
                    <span><5</span>
                  </div>
                </div>
            </div>
  
            <div class="m-3">
              <label for="">Lương thấp nhất</label>
              <div class="d-flex justify-content-center">
                <hr class="w-75 " >
              </div>
              
              <div class="d-flex justify-content-between">
                @if ($search[2] != null)
                <input type="range" id="volume" class="form-control w-75" value="{{$search[2]}}" name="salary" min="0" max="5000">
                <span id="volume-value" style="display: inline-block; ">{{$search[2]}}</span>USD
                @else
                <input type="range" id="volume" class="form-control w-75" value="50" name="salary" min="0" max="5000">
                <span id="volume-value" style="display: inline-block; "></span>USD
                @endif
                
              </div>
            </div>
            <div class="m-3">
              <button type="submit" class=" btn btn-primary">Tìm kiếm</button>
            </div>
  
          </div>
        </div>
        </form>
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
//   document.addEventListener('DOMContentLoaded', function () {
//     // Lắng nghe sự kiện onchange của checkbox
//     var radioButtons = document.querySelectorAll('input[type="radio"]');
//     radioButtons.forEach(function(radioButton) {
//         radioButton.addEventListener('change', function () {
//             // Gửi form khi một radio button được chọn
//             document.getElementById('searchTimeForm').submit();
//         });
//     });
// });
// document.addEventListener('DOMContentLoaded', function () {
//     // Lắng nghe sự kiện onchange của checkbox
//     var one = document.getElementById('one');
//     var three = document.getElementById('three');
//     var five = document.getElementById('five');
//     checkbox.addEventListener('change', function () {
//         // Gửi form khi checkbox được chọn
//         if (one.checked) {
//             document.getElementById('searchExForm').submit();
//         }
//         if (three.checked) {
//             document.getElementById('searchExForm').submit();
//         }
//         if (five.checked) {
//             document.getElementById('searchExForm').submit();
//         }
//     });
// });

// document.addEventListener('DOMContentLoaded', function () {
//     // Lắng nghe sự kiện onchange của input range
//     var inputRange = document.getElementById('salary');
//     inputRange.addEventListener('change', function () {
//         // Gửi form khi giá trị của input range thay đổi
//         document.getElementById('searchSalary').submit();
//     });
// });
</script>
@endsection


