<div class="modal fade"  id="NewLeave">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Create  a new staff leave category
                </h5>

                <!--begin::Close-->
                <a href="#MgtTaxes" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </a>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewLeave') }}" class="row" method="POST">
                    @csrf

                    <div class="mb-3 col-md-6">
                        <label for="" class="required form-label">Leave Category</label>
                        <input required type="text" class="form-control form-control-solid" name="LeaveType"/>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="" class="required form-label">Entitled Days</label>
                        <input required type="text" class="form-control IntOnlyNow form-control-solid" name="Days"/>
                    </div>
                <div class="mb-3 col-md-12 pt-3 mt-3">
                    <label id="label" for="" class="required form-label">Description </label>
                     <textarea    name="Description"></textarea>

                </div>

                    {!! Form::hidden($name="LID", $value=\Hash::make(uniqid()."LID".date('Y-m-d H:I:S')), [$options=null]) !!}

            </div>

            <div class="modal-footer">
                <a href="#MgtTaxes" id="StartMgt" data-bs-dismiss="modal" data-bs-toggle="modal" type="button" class="btn btn-info" >Close</a>

                <button type="submit" class="btn btn-danger" >Save Changes</button>

            </form>
            </div>

        </div>
    </div>
</div>
