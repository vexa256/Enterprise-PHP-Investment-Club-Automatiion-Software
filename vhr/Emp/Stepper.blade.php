<!--begin::Stepper-->
<div class="stepper stepper-pills" id="kt_stepper_example_basic">
    <!--begin::Nav-->
    <div class="stepper-nav flex-center flex-wrap mb-10">
        <!--begin::Step 1-->
        <div class="stepper-item mx-2 my-4 current" data-kt-stepper-element="nav">
            <!--begin::Line-->
            <div class="stepper-line w-40px"></div>
            <!--end::Line-->

            <!--begin::Icon-->
            <div class="stepper-icon w-40px h-40px">
                <i class="stepper-check fas fa-check"></i>
                <span class="stepper-number">1</span>
            </div>
            <!--end::Icon-->

            <!--begin::Label-->
            <div class="stepper-label">
                <h3 class="stepper-title">
                    Step 1
                </h3>

                <div class="stepper-desc">
                    Description
                </div>
            </div>
            <!--end::Label-->
        </div>
        <!--end::Step 1-->

        <!--begin::Step 2-->
        <div class="stepper-item mx-2 my-4" data-kt-stepper-element="nav">
            <!--begin::Line-->
            <div class="stepper-line w-40px"></div>
            <!--end::Line-->

            <!--begin::Icon-->
            <div class="stepper-icon w-40px h-40px">
                <i class="stepper-check fas fa-check"></i>
                <span class="stepper-number">2</span>
            </div>
            <!--begin::Icon-->

            <!--begin::Label-->
            <div class="stepper-label">
                <h3 class="stepper-title">
                    Step 2
                </h3>

                <div class="stepper-desc">
                    Description
                </div>
            </div>
            <!--end::Label-->
        </div>
        <!--end::Step 2-->

        <!--begin::Step 3-->
        <div class="stepper-item mx-2 my-4" data-kt-stepper-element="nav">
            <!--begin::Line-->
            <div class="stepper-line w-40px"></div>
            <!--end::Line-->

            <!--begin::Icon-->
            <div class="stepper-icon w-40px h-40px">
                <i class="stepper-check fas fa-check"></i>
                <span class="stepper-number">3</span>
            </div>
            <!--begin::Icon-->

            <!--begin::Label-->
            <div class="stepper-label">
                <h3 class="stepper-title">
                    Step 3
                </h3>

                <div class="stepper-desc">
                    Description
                </div>
            </div>
            <!--end::Label-->
        </div>
        <!--end::Step 3-->

        <!--begin::Step 4-->
        <div class="stepper-item mx-2 my-4" data-kt-stepper-element="nav">
            <!--begin::Line-->
            <div class="stepper-line w-40px"></div>
            <!--end::Line-->

            <!--begin::Icon-->
            <div class="stepper-icon w-40px h-40px">
                <i class="stepper-check fas fa-check"></i>
                <span class="stepper-number">4</span>
            </div>
            <!--begin::Icon-->

            <!--begin::Label-->
            <div class="stepper-label">
                <h3 class="stepper-title">
                    Step 4
                </h3>

                <div class="stepper-desc">
                    Description
                </div>
            </div>
            <!--end::Label-->
        </div>
        <!--end::Step 4-->
    </div>
    <!--end::Nav-->

    <!--begin::Form-->
    <form class="form col-12   mx-auto" novalidate="novalidate" id="kt_stepper_example_basic_form">
        <!--begin::Group-->
        <div class="mb-5">
            <!--begin::Step 1-->
            <div class="flex-column current " data-kt-stepper-element="content">
                <!--begin::Input group-->
                <div class="fv-row row mb-10">
                    <div class="mb-10 col-md-4">
                        <label for="exampleFormControlInput1" class="required form-label">Staff Name</label>
                        <input type="text" name="EmpName" class="form-control form-control-solid" />
                    </div>

                    <div class="mb-10 col-md-4">
                        <label for="exampleFormControlInput1" class="required form-label">
                            Phone
                        </label>
                        <input type="text" name="Phone" class="form-control form-control-solid" />
                    </div>


                    <div class="mb-10 col-md-4">
                        <label for="exampleFormControlInput1" class="required form-label">
                            Email
                        </label>
                        <input type="text" name="Email" class="form-control form-control-solid" />
                    </div>

                    <div class="mb-10 col-md-4">
                        <label for="exampleFormControlInput1" class="required form-label">
                            Local Address
                        </label>
                        <input type="text" name="LocalAddress" class="form-control form-control-solid" />
                    </div>

                    <div class="mb-10 col-md-4">
                        <label for="exampleFormControlInput1" class="required form-label">
                            Permanent Address
                        </label>
                        <input type="text" name="PermanentAddress" class="form-control form-control-solid" />
                    </div>

                    <div class="mb-10 col-md-4">
                        <label for="exampleFormControlInput1" class="required form-label">
                            Email
                        </label>
                        <input type="text" name="Email" class="form-control form-control-solid" />
                    </div>



                </div>
                <!--end::Input group-->


            </div>
            <!--begin::Step 1-->

        </div>
        <!--end::Group-->

        <!--begin::Actions-->
        <div class="d-flex flex-stack">
            <!--begin::Wrapper-->
            <div class="me-2">
                <button type="button" class="btn btn-light btn-active-light-primary" data-kt-stepper-action="previous">
                    Back
                </button>
            </div>
            <!--end::Wrapper-->

            <!--begin::Wrapper-->
            <div>
                <button type="button" class="btn btn-primary" data-kt-stepper-action="submit">
                    <span class="indicator-label">
                        Submit
                    </span>
                    <span class="indicator-progress">
                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>

                <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                    Continue
                </button>
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
<!--end::Stepper-->
