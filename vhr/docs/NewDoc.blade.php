<div class="modal fade"  id="NewDoc">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Attach new external documentation to the staff member
                    <span class="text-danger font-weight-bold">
                        {{$StaffName}}
                    </span>
                </h5>

                <!--begin::Close-->
                <a href="#MgtTaxes" data-bs-toggle="modal" type="button" class="btn btn-info" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </a>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewDoc') }}" method="POST" class="row" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3 col-md-4" >
                        <label class="required form-label">Staff Member </label>
                        <input readonly  type="text"   value="{{$StaffName}}" class="form-control-sm   form-control form-control-solid" />
                    </div>

                    <div class="mb-3 col-md-4" >
                        <label class="required form-label">Document Name </label>
                        <input name="DocumentName"  type="text" required  class="form-control-sm   form-control form-control-solid" /> </div>


                        <div class="mb-3 col-md-4" >
                            <label class="required form-label">Upload PDF </label>
                            <input name="DocURL"  type="file" required  class="form-control-sm   form-control form-control-solid" /> </div>



                            <div class="mt-2 col-md-12" >
                                <label class="required form-label">Upload PDF </label>
                                <textarea name="Description"></textarea>
                            </div>


             <input type="hidden" name="EmpID" value="{{$EmpID}}">

            <input type="hidden" name="DocID" value="{{\Hash::make($EmpID)}}">

            <input type="hidden" name="id" value="{{$id}}">






            </div>

            <div class="modal-footer">
                <a data-bs-toggle="modal" href="#MgtTaxes" type="button" class="btn btn-info" data-bs-dismiss="modal">Close</a>

                <button type="submit"  class="btn btn-danger" >Save Changes</button>

     </form>
            </div>

        </div>
    </div>
</div>
