<div class="modal fade"  id="NewAssign">
    <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Assign leave rights to selected staff member
                </h5>

                <!--begin::Close-->
                <a href="#MgtTaxes" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </a>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('AcceptAssign') }}" class="row" method="POST">
                    @csrf

                    <div class="mb-3 col-md-12" >
                        <label id="label" for="" class="required form-label">Choose Leave Category</label>
                        <select name="LID" style="height: 15px !important" required class="form-select form-control-sm  form-control" data-control="select2" data-placeholder="Select an option">
                            <option></option>
                           @isset($LeaveTypes)

                           @foreach ($LeaveTypes    as  $data )

                           <option value="{{$data->LID}}">{{$data->LeaveType}}</option>

                           @endforeach
                           @endisset
                        </select>

                    </div>

                    <input type="hidden" name="EmpID" value="{{$EmpID}}">



            </div>

            <div class="modal-footer">
                <a href="#MgtTaxes" id="StartMgt" data-bs-dismiss="modal" data-bs-toggle="modal" type="button" class="btn btn-info" >Close</a>

                <button type="submit" class="btn btn-danger" >Save Changes</button>

            </form>
            </div>

        </div>
    </div>
</div>
