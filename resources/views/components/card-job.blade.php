@props(['jobItem'])
@php
$tagArr = explode(',',$jobItem->tags);
@endphp
<div class="bg-card py-3 px-2 container-fluid d-flex mb-4" style="min-height: 140px">
    <div class="row align-items-center w-100">
        <div class="col-12 col-md-2 mb-md-0 mb-4 text-center">
            <a href="/job/{{$jobItem->id}}" class=" p-2 bg-white border border-1 border-lighter " style="display: inline-block;width: 110px;height: 110px">
                <img src="{{!empty($jobItem->logos) ? asset('storage/'.$jobItem->logos) : asset('images/logo_default.png')}}" alt="Logo" class="w-100 h-100 object-fit-cover ">
            </a>
        </div>
        <div class="col-12 col-md-10">
            <div>
                <div class="d-flex align-items-center justify-content-between">
                    <h4><a href="/job/{{$jobItem->id}}">{{$jobItem->title}}</a></h4>
                    <span class="fs-6 text-black">Salary: ${{$jobItem->salary}}</span>
                </div>
                <div class="text-xs text-secondary fw-normal">{{$jobItem->address.', '.$jobItem->city}}</div>
                <div class="d-flex align-items-center">
                    <div class="text-xs text-secondary fw-normal">{{$jobItem->company}}</div>
                    <span class="mx-2">•</span>
                    <div class="text-xs text-secondary fw-normal">{{$jobItem->time}}</div>

                </div>

            </div>
            <div class="mt-2 d-flex align-items-center gap-2">
                @foreach($tagArr as $tagItem)
                <a href="/?tag={{$tagItem}}" class="badge rounded-pill bg-tags text-dark px-4 py-2 text-capitalize tag-hover">{{$tagItem}}</a>

                @endforeach
            </div>
        </div>
    </div>


</div>
