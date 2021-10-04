<div class="modal fade"  id="NewStaff">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Add a new staff member record to the database


                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewEmp') }}" class="row" method="POST" enctype= multipart/form-data>

                    @csrf

                @for($x = 0; $x < count($Form); $x++)




                    <div class="mb-3 col-md-3" id="el{{$Form[$x]}}">
                        <label id="label{{$Form[$x]}}" for="exampleFormControlInput1" class="required form-label">


                            @if ($Form[$x] == "BankCode")

                            {{ucfirst(FromCamelCase($Form[$x]))}} (NA if not required)

                            @else

                            {{ucfirst(FromCamelCase($Form[$x]))}}
                            @endif
                        </label>
                        <input  id="input{{$Form[$x]}}" type="text" required   name="{{$Form[$x]}}" class="form-control-sm   form-control form-control-solid" />
                    </div>
                @endfor


                <div class="mb-3 col-md-3" >
                    <label id="label" for="exampleFormControlInput1" class="required form-label">Department</label>
                    <select name="Department" style="height: 15px !important" required class="form-select form-control-sm  form-control" data-control="select2" data-placeholder="Select an option">
                        <option></option>
                       @isset($Departments)

                       @foreach ($Departments    as  $data )

                       <option value="{{$data->DeptName}}">{{$data->DeptName}}</option>

                       @endforeach
                       @endisset
                    </select>

                </div>

                <div class="mb-3 col-md-2" >
                    <label id="label" for="exampleFormControlInput1" class="required form-label">Joining Date </label>
                    <input type="text" required   name="JoiningDate" class="form-control-sm   form-control DateArea form-control-solid" />
                </div>


                <div class="mb-3 col-md-2" >
                    <label id="label" for="exampleFormControlInput1" class="required form-label">DOB </label>
                    <input type="text" required   name="DOB" class="form-control-sm   form-control DateArea form-control-solid" />
                </div>

                <div class="mb-3 col-md-2" >
                    <label id="label" for="exampleFormControlInput1" class="required form-label">National ID Scan </label>
                    <input type="file" name="IDScan" class="form-control-sm   form-control  form-control-solid" />
                </div>

                    {!! Form::hidden($name="EmpID", $value=\Hash::make(uniqid()."AFC".date('Y-m-d H:I:S')), [$options=null]) !!}

                <div class="mb-3 col-md-3" >
                    <label id="label" for="exampleFormControlInput1" class="required form-label">Staff Photo</label>
                    <input type="file" name="StaffPhoto" class="form-control-sm   form-control  form-control-solid" />
                </div>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-dark" >Save Changes</button>

            </form>
            </div>

        </div>
    </div>
</div>
