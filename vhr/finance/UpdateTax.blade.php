@isset($Taxes)
    @foreach ($Taxes as $data )
    <div class="modal fade"  id="UpdateTax{{$data->id}}">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-gray">
                    <h5 class="modal-title">Update the tax category labeled
                        <span class="text-danger font-weight-bold">
                            {{$data->Tax}}
                        </span>
                    </h5>

                    <!--begin::Close-->
                    <a href="#MgtTaxes" data-bs-toggle="modal" type="button" class="btn btn-info" data-bs-dismiss="modal" class="btn  btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                    </a>
                    <!--end::Close-->
                </div>

                <div class="modal-body ">

                    <form method="POST" action="{{ route('UpdateTax') }}" class="row">
                                      @csrf

                    <div class="mb-3 col-md-6" id="">
                        <label id="label" for="exampleFormControlInput1" class="required form-label"> Tax </label>
                        <input value="{{$data->Tax}}" type="text" required   name="Tax" class="form-control-sm    form-control form-control-solid" />
                    </div>

                    <input type="hidden" name="id" value="{{$data->id}}">

                    <div class="mb-3 col-md-6" id="">
                        <label id="label" for="exampleFormControlInput1" class="required form-label"> Percentage (%) </label>
                        <input value="{{$data->Percentage}}"   type="text" required   name="Percentage" class="form-control-sm    form-control  IntOnlyNow form-control-solid" />
                    </div>

                    <div class="mb-3 col-md-12 pt-3">
                        <label id="label" for="" class="required form-label">Description </label>
                         <textarea  name="Description">

                            {!!$data->Description!!}
                         </textarea>

                    </div>

                </div>

                <div class="modal-footer">
                    <a href="#MgtTaxes" data-bs-toggle="modal" type="button" class="btn btn-info" data-bs-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-dark" >Save Changes</button>
                </div>

            </form>

            </div>
        </div>
    </div>
    @endforeach
@endisset
