@isset($Deductions)
    @foreach ($Deductions as $data )
    <div class="modal fade"  id="Deductions{{$data->id}}">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-gray">
                    <h5 class="modal-title">View description for the deduction category labeled
                        <span class="text-danger font-weight-bold">
                            {{$data->Deduction}}
                        </span>
                    </h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body ">

                    <textarea>
                        {{$data->Description}}
                    </textarea>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>


                </div>

            </div>
        </div>
    </div>
    @endforeach
@endisset
