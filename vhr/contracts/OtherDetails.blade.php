@isset($Contracts)
@foreach ($Contracts as $data )
    <div class="modal fade"  id="OtherDetails{{$data->id}}">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-gray">
                    <h5 class="modal-title">View more details about the selected contractor
                        <span class="text-danger font-weight-bold">
                            {{$data->ContractorName}}
                        </span>
                    </h5>

                    <!--begin::Close-->
                    <a href="#MgtTaxes"  type="button" class="btn btn-info"  class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                    </a>
                    <!--end::Close-->
                </div>

                <div class="modal-body ">

                    <textarea>
                        {{$data->OtherContractorDetails}}
                    </textarea>

                </div>

                <div class="modal-footer">
                    <a type="button" class="btn btn-info" data-bs-dismiss="modal">Close</a>


                </div>

            </div>
        </div>
    </div>
    @endforeach
@endisset
