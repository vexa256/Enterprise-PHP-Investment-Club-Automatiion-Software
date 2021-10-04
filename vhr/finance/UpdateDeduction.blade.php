@isset($Deductions)
    @foreach ($Deductions as $data )
    <div class="modal fade"  id="UpdateDeduction{{$data->id}}">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-gray">
                    <h5 class="modal-title">Update the deduction category labeled
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

                    <form method="POST" action="{{ route('UpdateDeduction') }}" class="row">
                                      @csrf

                    <div class="mb-3 col-md-6" id="">
                        <label id="label" for="exampleFormControlInput1" class="required form-label"> Deduction </label>
                        <input value="{{$data->Deduction}}"  id="input" type="text" required   name="Deduction" class="form-control-sm    form-control form-control-solid" />
                    </div>

                    <input type="hidden" name="id" value="{{$data->id}}">

                    <div class="mb-3 col-md-6" id="">
                        <label id="label" for="exampleFormControlInput1" class="required form-label"> Amount (UGX) </label>
                        <input value="{{$data->Amount}}"  id="input" type="text" required   name="Amount" class="form-control-sm    form-control IntOnlyNow form-control-solid" />
                    </div>

                    <div class="mb-3 col-md-12 pt-3">
                        <label id="label" for="" class="required form-label">Description </label>
                         <textarea  name="Description">

                            {!!$data->Description!!}
                         </textarea>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark" >Save Changes</button>
                </div>

            </form>

            </div>
        </div>
    </div>
    @endforeach
@endisset
