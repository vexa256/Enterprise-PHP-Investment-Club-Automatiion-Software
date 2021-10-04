<div class="modal fade"  id="New">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Send new notice to staff
                </h5>

                <!--begin::Close-->
                <a href="#MgtTaxes" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </a>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewNotice') }}" class="row" method="POST">
                    @csrf

                    <div class="mb-3 col-md-12">
                        <label for="" class="required form-label">Subject</label>
                        <input required type="text" class="form-control form-control-solid" name="Subject"/>
                    </div>

                    <input type="hidden" name="Name" value="{{Auth::user()->name}}">

                <div class="mb-3 col-md-12 pt-3 mt-3">
                    <label id="label" for="" class="required form-label">Notice </label>
                     <textarea name="Notice"></textarea>

                </div>



            </div>

            <div class="modal-footer">
                <a href="#MgtTaxes" id="StartMgt" data-bs-dismiss="modal" data-bs-toggle="modal" type="button" class="btn btn-info" >Close</a>

                <button type="submit" class="btn btn-danger" >Send Notice</button>

            </form>
            </div>

        </div>
    </div>
</div>
