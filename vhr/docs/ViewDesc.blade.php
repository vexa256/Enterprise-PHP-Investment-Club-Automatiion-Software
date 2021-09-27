@isset($Docs)
    @foreach ($Docs as $data )
    <div class="modal fade"  id="DocDesc{{$data->id}}">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-gray">
                    <h5 class="modal-title">View description for external document labeled
                        <span class="text-danger font-weight-bold">
                            {{$data->DocumentName}} , it is attached to the staff member {{$StaffName}}
                        </span>
                    </h5>

                    <!--begin::Close-->
                    <a href="#"  type="button" class="btn btn-info" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                    </a>
                    <!--end::Close-->
                </div>

                <div class="modal-body ">

                    <textarea>
                        {{$data->Description}}
                    </textarea>

                </div>

                <div class="modal-footer">
                    <a data-bs-toggle="modal" href="#MgtDocs" type="button" class="btn btn-info" data-bs-dismiss="modal">Close</a>


                </div>

            </div>
        </div>
    </div>
    @endforeach
@endisset
