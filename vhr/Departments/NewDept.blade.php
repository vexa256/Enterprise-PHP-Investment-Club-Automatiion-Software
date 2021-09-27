<div class="modal fade"  id="NewDept">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create new organization department</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form action="{{ route('NewDept') }}" class="row" method="POST">
                    @csrf
                    <div class="mb-10 col-md-12">
                        <label for="exampleFormControlInput1" class="required form-label">Department Name</label>
                        <input type="text" name="DeptName" class="form-control form-control-solid" placeholder="Example input"/>
                    </div>

                    <div class="mb-10 col-md-12">
                        <label for="exampleFormControlInput1" class="required form-label">Brief description</label>
                        <textarea name="Desc"></textarea>
                    </div>

                    {!! Form::hidden($name="DeptID", $value=\Hash::make(date("M-d-Y H:I:s"))) !!}

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn sahdow-lg btn-dark">Save changes</button>

            </div>
        </form>
        </div>
    </div>
</div>
