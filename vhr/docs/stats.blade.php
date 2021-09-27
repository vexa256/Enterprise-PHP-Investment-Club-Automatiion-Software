<div class="row g-0">
    <!--begin::Col-->
    <div class="col bg-dark shadow-lg px-6 py-8 rounded-2 me-7">
        <!--begin::Svg Icon | path: icons/duotone/Design/Layers.svg-->
        <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
            <i class="fas text-light fa-2x fa-users" aria-hidden="true"></i>
        </span>
        <!--end::Svg Icon-->
        <a href="#" class="text-light fw-bold fs-6 mt-2">Staff Member : {{$StaffName}}</a>
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col bg-info shadow-lg px-6 py-8 rounded-2">
        <!--begin::Svg Icon | path: icons/duotone/Communication/Urgent-mail.svg-->
        <span class="svg-icon fs-1 text-light svg-icon-success d-block my-2">
           {{$count}}
        </span>
        <!--end::Svg Icon-->
        <a href="#" class="text-light fw-bold fs-6 mt-2">Assigned Documents</a>
    </div>
    <!--end::Col-->
</div>
