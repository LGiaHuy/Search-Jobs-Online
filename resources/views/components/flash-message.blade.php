@if(session()->has("message"))
<div x-data="{open:true}" x-show="open" x-init="setTimeout(() => {open = false},2000)" x-transition class="position-fixed start-50 translate-middle alert alert-success" role="alert" style="top: 100px">
    {{session()->get("message")}}
</div>
@endif
@if(session()->has("error"))
<div x-data="{open:true}" x-show="open" x-init="setTimeout(() => {open = false},2000)" x-transition class="position-fixed start-50 translate-middle alert alert-danger" role="alert" style="top: 100px">
    {{session()->get("error")}}
</div>
@endif