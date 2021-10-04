@isset($Employees)
    @foreach ($Employees as  $data)
    <div class="modal fade"  id="JD{{$data->id}}">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View the job description for the selected head of department, Selected head of department is
                        <span class="text-danger font-weight-bold">
                            {{$data->EmployeeName}}
                        </span>
                    </h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">


                        <div class="mb-10 col-md-12">
                            <label for="exampleFormControlInput1" class="required form-label">Job Description</label>
                            <textarea name="Desc">
                                {!! $data->JobDescription!!}
                            </textarea>
                        </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-dark shadow-lg" data-bs-dismiss="modal">Close</button>


                </div>

            </div>
        </div>
    </div>

    @endforeach
@endisset
