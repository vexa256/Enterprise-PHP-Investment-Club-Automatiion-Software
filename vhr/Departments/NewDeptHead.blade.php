<div class="modal fade"  id="NewDeptHead">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign a given staff member the role of department </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form action="{{ route('NewDeptHead') }}" class="row" method="POST" >

                    @csrf
                    <div class="mb-3 col-md-4" >
                        <label id="label" for="exampleFormControlInput1" class="required form-label">Select Staff Member</label>
                        <select name="EmployeeName" style="height: 15px !important" required class="form-select form-control-sm  form-control" data-control="select2" data-placeholder="Select an option">
                            <option></option>
                           @isset($ReportsTo)

                           @foreach ($ReportsTo    as  $data )

                           <option value="{{$data->StaffName}}">{{$data->StaffName}}</option>

                           @endforeach
                           @endisset
                        </select>

                    </div>



                    <div class="mb-3 col-md-4" >
                        <label id="label" for="exampleFormControlInput1" class="required form-label">Select Department</label>
                        <select name="Department" style="height: 15px !important" required class="form-select form-control-sm  form-control" data-control="select2" data-placeholder="Select an option">
                            <option></option>
                           @isset($Departments)

                           @foreach ($Departments    as  $data )

                           <option value="{{$data->DeptName}}">{{$data->DeptName}}</option>

                           @endforeach
                           @endisset
                        </select>

                    </div>



                    <div class="mb-3 col-md-4" >
                        <label id="label" for="exampleFormControlInput1" class="required form-label">Reports To</label>
                        <select name="ReportsTo" style="height: 15px !important" required class="form-select form-control-sm  form-control" data-control="select2" data-placeholder="Select an option">
                            <option></option>
                           @isset($ReportsTo)

                           @foreach ($ReportsTo    as  $data )

                           <option value="{{$data->Designation}}">{{$data->Designation}}</option>

                           @endforeach
                           @endisset
                        </select>

                    </div>



                    <div class="mb-3 col-md-12" >
                        <label id="label" for="exampleFormControlInput1" class="required form-label">Job Description</label>
                       <textarea name="JobDescription">

                       </textarea>
                    </div>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn sahdow-lg btn-dark">Save changes</button>

            </div>
        </form>
        </div>
    </div>
</div>
