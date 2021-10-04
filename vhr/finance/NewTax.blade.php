<div class="modal fade"  id="NewTax">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Add new payroll tax category. A tax is imposed on an applicable staff member's salary payment.
                </h5>

                <!--begin::Close-->
                <a href="#MgtTaxes" data-bs-toggle="modal" type="button" class="btn btn-info" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </a>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('NewTax') }}" class="row" method="POST">
                    @csrf
                @for($x = 0; $x < count($TForm); $x++)

                    <div class="mb-3 col-md-6" id="el{{$TForm[$x]}}">
                        <label id="label{{$TForm[$x]}}" for="exampleFormControlInput1" class="required form-label">

                               {{ucfirst(FromCamelCase($TForm[$x]))}}
                                @if ($TForm[$x] == "Percentage")
                                    (%, Numbers only)
                                @endif
                        </label>
                        <input  id="input{{$TForm[$x]}}" type="text" required   name="{{$TForm[$x]}}" class="form-control-sm   form-control form-control-solid" />
                    </div>
                @endfor
                <div class="mb-3 col-md-12 pt-3">
                    <label id="label" for="" class="required form-label">Description </label>
                     <textarea  name="Description"></textarea>

                </div>

                    {!! Form::hidden($name="TID", $value=\Hash::make(uniqid()."BID".date('Y-m-d H:I:S')), [$options=null]) !!}

            </div>

            <div class="modal-footer">
                <a href="#MgtTaxes" id="StartMgt" data-bs-dismiss="modal" data-bs-toggle="modal" type="button" class="btn btn-info" >Close</a>

                <button type="submit" class="btn btn-dark" >Save Changes</button>

            </form>
            </div>

        </div>
    </div>
</div>
