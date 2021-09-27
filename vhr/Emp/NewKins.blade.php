@isset($Employees)
@foreach ($Employees as $data )
<div class="modal fade"  id="NewKin{{$data->id}}">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Attach a next of kin to the  staff member

                    <span class="text-danger font-weight-bold">{{$data->StaffName}}</span>

                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewKin') }}" class="row" method="POST" enctype= multipart/form-data>

                    @csrf

                @for($x = 0; $x < count($FormKins); $x++)




                    <div class="mb-3 col-md-4" id="el{{$FormKins[$x]}}">
                        <label id="label{{$FormKins[$x]}}" for="exampleFormControlInput1" class="required form-label">


                            @if ($FormKins[$x] == "BankCode")

                            {{ucfirst(FromCamelCase($FormKins[$x]))}} (NA if not required)

                            @else

                            {{ucfirst(FromCamelCase($FormKins[$x]))}}
                            @endif
                        </label>
                        <input  id="input{{$FormKins[$x]}}" type="text" required   name="{{$FormKins[$x]}}" class="form-control-sm   form-control form-control-solid" />
                    </div>
                @endfor

                    <input required type="hidden" name="EmpID" value="{{$data->EmpID}}">
                    <input required type="hidden" name="EmployeeName" value="{{$data->StaffName}}">






            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-dark" >Save Changes</button>

            </form>
            </div>

        </div>
    </div>
</div>
@endforeach
@endisset
