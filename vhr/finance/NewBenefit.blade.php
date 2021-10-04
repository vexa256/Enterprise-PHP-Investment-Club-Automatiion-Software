<div class="modal fade"  id="NewBenefit">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Add new payroll benefit. A benefit is added to an applicable staff member's salary payment.
                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('Newbenefit') }}" class="row" method="POST">
                    @csrf
                @for($x = 0; $x < count($BForm); $x++)

                    <div class="mb-3 col-md-6" id="el{{$BForm[$x]}}">
                        <label id="label{{$BForm[$x]}}" for="exampleFormControlInput1" class="required form-label">

                               {{ucfirst(FromCamelCase($BForm[$x]))}}
                                @if ($BForm[$x] == "Amount")
                                    (UGX, Numbers only)
                                @endif
                        </label>
                        <input  id="Binput{{$BForm[$x]}}" type="text" required   name="{{$BForm[$x]}}" class="form-control-sm   form-control form-control-solid" />
                    </div>
                @endfor
                <div class="mb-3 col-md-12 pt-3">
                    <label id="label" for="" class="required form-label">Description </label>
                     <textarea  name="Description"></textarea>

                </div>

                    {!! Form::hidden($name="BID", $value=\Hash::make(uniqid()."BID".date('Y-m-d H:I:S')), [$options=null]) !!}

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-dark" >Save Changes</button>

            </form>
            </div>

        </div>
    </div>
</div>
