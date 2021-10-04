<div class="modal fade"  id="NewAssign">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Assign the selected staff member an supervisor
                </h5>

                <!--begin::Close-->
                <a href="#MgtTaxes" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </a>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('AssignNewSuper') }}" class="row" method="POST">
                    @csrf

        <input type="hidden" name="StaffMemberDepartment"  value="{{$Employees->Department}}">
        <input type="hidden" name="StaffMemberEmpID"  value="{{$Employees->EmpID}}">
        <input type="hidden" name="StaffMemberDesignation"  value="{{$Employees->Designation}}">
        <input type="hidden" name="StaffMemberCode"  value="{{$Employees->StaffCode}}">
        <input type="hidden" name="id"  value="{{$Employees->id}}">


                    <div class="mb-3 col-md-6">
                        <label for="" class="required form-label">Staff Member</label>
                        <input readonly value="{{$Employees->StaffName}}" required type="text" class="form-control form-control-solid" name="StaffMember"/>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label  class="required form-label">Select Supervisor</label>
                        <select required name="Supervisor" class="form-select form-select-solid" data-control="select2" data-placeholder="Select staff member">
                            <option></option>
                            @isset($Assign)


                                @foreach ($Assign as $data )


                                <option value="{{$data->SID}}">{{$data->StaffName}}</option>
                                @endforeach
                            @endisset


                        </select>
                    </div>





            </div>

            <div class="modal-footer">
                <a href="#" data-bs-dismiss="modal" class="btn btn-info" >Close</a>

                <button type="submit" class="btn btn-danger" >Save Changes</button>

            </form>
            </div>

        </div>
    </div>
</div>
