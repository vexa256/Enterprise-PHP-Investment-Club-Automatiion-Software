<div class="row g-0 mb-5">
    <!--begin::Col-->
    <div class="col bg-dark shadow-lg  rounded-5 px-3 py-3 me-7">
        <!--begin::Svg Icon | path: icons/duotone/Design/Layers.svg-->
        <span class="svg-icon fs-4 text-light svg-icon-success d-block my-2">
           Selected Employee
         </span>
        <!--end::Svg Icon-->
        <a href="#" class="text-light fw-bold fs-6 mt-2">{{$StaffName}}</a>
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col bg-info shadow-lg   me-7 rounded-5 px-3 py-3">
        <!--begin::Svg Icon | path: icons/duotone/Communication/Urgent-mail.svg-->
        <span class="svg-icon fs-4 text-light svg-icon-success d-block my-2">
           {{number_format($DeductionsCount, 2)}} UGX
        </span>
        <!--end::Svg Icon-->
        <a href="#" class="text-light fw-bold fs-6  me-7 mt-2">Deductions</a>
    </div>
    <!--end::Col-->

    <!--end::Col-->
    <!--begin::Col-->
    <div class="col bg-info shadow-lg  rounded-5 px-3 py-3 me-7">
        <!--begin::Svg Icon | path: icons/duotone/Communication/Urgent-mail.svg-->
        <span class="svg-icon fs-4 text-light svg-icon-success d-block my-2">
           {{number_format($BenefitsCount, 2)}} UGX
        </span>
        <!--end::Svg Icon-->
        <a href="#" class="text-light fw-bold fs-6 mt-2">Benefits</a>
    </div>
    <!--end::Col-->

     <!--begin::Col-->
     <div class="col bg-info shadow-lg  rounded-5 px-3 py-3 me-7">
        <!--begin::Svg Icon | path: icons/duotone/Communication/Urgent-mail.svg-->
        <span class="svg-icon fs-4 text-light svg-icon-success d-block my-2">
           {{$TaxCount}}%
        </span>
        <!--end::Svg Icon-->
        <a href="#" class="text-light fw-bold fs-6 mt-2">Taxes</a>
    </div>
    <!--end::Col-->

     <!--begin::Col-->
     <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="left" data-bs-original-title="This figure does not include taxes, deductions and benefits" class="col bg-info shadow-lg  rounded-5 px-3 py-3">
        <!--begin::Svg Icon | path: icons/duotone/Communication/Urgent-mail.svg-->
        <span class="svg-icon fs-4 text-light svg-icon-success d-block my-2">
           {{number_format($MonthlySalary, 2)}} UGX
        </span>
        <!--end::Svg Icon-->
        <a   href="#" class="text-light fw-bold fs-6 mt-2"> Gross Salary </a>
    </div>
    <!--end::Col-->
</div>
