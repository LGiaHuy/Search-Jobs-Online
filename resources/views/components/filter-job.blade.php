@php
$volumn = 0;
$left = -3;
if(!empty($experience)) {
$volumn = $experience;
$left = $volumn*100/10;
}
@endphp
<div class="bg-white border border-1 border-lighter p-3 rounded">
    <div class="filter-heading">All Filter</div>
    <form action="" id="form-filter">

        <div class="mt-3 border-top border-lighter pt-3">
            <div class="filter-heading">Thời gian làm việc</div>

            <div class="form-check mt-2">
                <input class="form-check-input time-checkbox" type="checkbox" name="full" value="Full-time" id="flexCheckDefault" {{!empty($timeFull) ? "checked" : ""}}>
                <label class="form-check-label fs-6" for="flexCheckDefault">
                    FullTime
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input time-checkbox" type="checkbox" name="part" value="Part-time" id="flexCheckChecked" {{!empty($timePart) ? "checked" : ""}}>
                <label class="form-check-label fs-6" for="flexCheckChecked">
                    PartTime
                </label>
            </div>

        </div>
        <div class="mt-3 border-top border-lighter pt-3">
            <div class="filter-heading">Lương (USD)</div>
            <div class="form-check mt-2">
                <input class="form-check-input salary-radio" type="radio" name="salary" value="0to1000" id="flexCheckDefault" {{!empty($salary) && $salary == "0to1000" ? "checked" : ""}}>
                <label class="form-check-label fs-6" for="flexCheckDefault">
                    0 - 1000
                </label>
            </div>
            <div class="form-check mt-2">
                <input class="form-check-input salary-radio" type="radio" name="salary" value="1000to2000" id="flexCheckChecked" {{!empty($salary) && $salary == "1000to2000" ? "checked" : ""}}>
                <label class="form-check-label fs-6" for="flexCheckChecked">
                    1000 - 2000
                </label>
            </div>
            <div class="form-check mt-2">
                <input class="form-check-input salary-radio" type="radio" name="salary" value="2000to3000" id="flexCheckChecked" {{!empty($salary) && $salary == "2000to3000" ? "checked" : ""}}>
                <label class="form-check-label fs-6" for="flexCheckChecked">
                    2000 - 3000
                </label>
            </div>
            <div class="form-check mt-2">
                <input class="form-check-input salary-radio" type="radio" name="salary" value="3000" id="flexCheckChecked" {{!empty($salary) && $salary == "3000" ? "checked" : ""}}>
                <label class="form-check-label fs-6" for="flexCheckChecked">
                    3000 trở lên
                </label>
            </div>
        </div>
        <div class="mt-3 border-top border-lighter pt-3">
            <div class="filter-heading">Kinh nghiệm</div>
            <div class="range-container mt-5 w-100 position-relative">
                <div class="range-tooltip" style='left: {{$left}}%;transform: translateX(-{{$left}}%)'>{{$volumn}}</div>

                <input type="range" min="0" max="10" value="{{$volumn}}" class="range-slider " id="myRange" name="exper">
                <div class="range-flow" style='width: {{$volumn*100/10}}%'>
                </div>
            </div>

        </div>
    </form>
</div>
<script>
    const formFilter = document.querySelector("#form-filter");
    const timeCheckBoxs = document.querySelectorAll(".time-checkbox");
    const salaryRadios = document.querySelectorAll(".salary-radio");
    timeCheckBoxs.forEach((timeCheckBox) => {
        timeCheckBox.addEventListener("change", (e) => {
            formFilter.submit();
        })
    })
    salaryRadios.forEach((salaryRadio) => {
        salaryRadio.addEventListener("change", (e) => {
            formFilter.submit();
        })
    })
    const rangeSliderFilter = document.querySelector('.range-slider');
    const rangeFlowFilter = document.querySelector('.range-flow');
    const rangeTooltip = document.querySelector('.range-tooltip');
    rangeSliderFilter.addEventListener("input", (e) => {
        let valueRange = rangeSliderFilter.value;
        let maxRange = rangeSliderFilter.max;
        let widthPer = (valueRange * 100) / maxRange;
        rangeFlowFilter.style = `width: ${widthPer}%`;
        rangeTooltip.style = `left: ${widthPer==0?-3:widthPer}%;transform: translateX(-${widthPer}%)`;
        rangeTooltip.textContent = valueRange;

    })
    rangeSliderFilter.addEventListener('change', (e) => {
        formFilter.submit();
    })
</script>
