<div class="modal fade"  id="NewDeduction">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Add new payroll deduction. A deduction is deducted on an applicable staff member's salary payment.
                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewDeduction') }}" class="row" method="POST">
                    @csrf
                @for($x = 0; $x < count($DForm); $x++)

                    <div class="mb-3 col-md-6" id="el{{$DForm[$x]}}">
                        <label id="label{{$DForm[$x]}}" for="exampleFormControlInput1" class="required form-label">

                               {{ucfirst(FromCamelCase($DForm[$x]))}}
                                @if ($DForm[$x] == "Amount")
                                    (UGX, Numbers only)
                                @endif
                        </label>
                        <input  id="Dinput{{$DForm[$x]}}" type="text" required   name="{{$DForm[$x]}}" class="form-control-sm   form-control form-control-solid" />
                    </div>
                @endfor
                <div class="mb-3 col-md-12 pt-3">
                    <label id="label" for="" class="required form-label">Description </label>
                     <textarea  name="Description"></textarea>

                </div>

                    {!! Form::hidden($name="DID", $value=\Hash::make(uniqid()."BID".date('Y-m-d H:I:S')), [$options=null]) !!}

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-dark" >Save Changes</button>

            </form>
            </div>

        </div>
    </div>
</div>
