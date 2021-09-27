<div class="modal fade"  id="NewApp">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Leave Application form
                </h5>

                <!--begin::Close-->
                <a href="#" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </a>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewApp') }}" class="row" method="POST">
                    @csrf

                    <div class="mb-3 col-md-4" >
                        <label id="label" for="" class="required form-label">Start Date </label>
                        <input type="text" required   name="StartDate" class="form-control-sm   form-control DateArea form-control-solid" />
                    </div>

                    <div class="mb-3 col-md-4" >
                        <label id="label" for="" class="required form-label">End Date </label>
                        <input type="text" required   name="EndDate" class="form-control-sm   form-control DateArea form-control-solid" />
                    </div>


                    <div class="mb-3 col-md-4" >
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


                <div class="mb-3 col-md-12 pt-3 mt-3">
                    <label id="label" for="" class="required form-label">Leave Application Letter </label>
                     <textarea    name="AppLetter"></textarea>

                </div>



            </div>

            <div class="modal-footer">
                <a href="#MgtTaxes" id="StartMgt" data-bs-dismiss="modal" data-bs-toggle="modal" type="button" class="btn btn-info" >Close</a>

                <button type="submit" class="btn btn-danger" >Apply for Leave</button>

            </form>
            </div>

        </div>
    </div>
</div>
