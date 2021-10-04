@isset($Kins)
@foreach ($Kins as $data )
<div class="modal fade"  id="UpdateKins{{$data->id}}">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update info for the next of kin

                    <span class="text-danger font-weight-bold">
                        {{$data->Name}}

                    </span> attached to the staff member

                    <span class="text-danger font-weight-bold">
                        {{$data->EmployeeName}}
                    </span>
                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form action="{{ route('UpdateKins') }}" class="row" method="POST" >
                    @csrf
                    <div class="mb-3 col-md-4" id="elName"><label id="labelName" for="exampleFormControlInput1"
                            class="required form-label"> Name </label><input id="inputName" type="text" required
                            name="Name" class="form-control-sm form-control form-control-solid"  value="{{$data->Name}}" >
                        </div>
                    <div class="mb-3 col-md-4" id="elRelationship"><label id="labelRelationship"
                            for="exampleFormControlInput1" class="required form-label"> Relationship </label><input
                            id="inputRelationship" type="text" required name="Relationship"
                            class="form-control-sm form-control form-control-solid"  value="{{$data->Relationship}}" ></div>
                    <div class="mb-3 col-md-4" id="elPhoneNumber"><label id="labelPhoneNumber"
                            for="exampleFormControlInput1" class="required form-label"> Phone number </label><input
                            id="inputPhoneNumber" type="text" required name="PhoneNumber"
                            class="form-control-sm form-control form-control-solid"  value="{{$data->PhoneNumber}}" ></div>
                    <div class="mb-3 col-md-4" id="elCurrentAddress"><label id="labelCurrentAddress"
                            for="exampleFormControlInput1" class="required form-label"> Current address </label><input
                            id="inputCurrentAddress" type="text" required name="CurrentAddress"
                            class="form-control-sm form-control form-control-solid"  value="{{$data->CurrentAddress}}" ></div>
                    <div class="mb-3 col-md-4" id="elPermanentAddress"><label id="labelPermanentAddress"
                            for="exampleFormControlInput1" class="required form-label"> Permanent address </label><input
                            id="inputPermanentAddress" type="text" required name="PermanentAddress"
                            class="form-control-sm form-control form-control-solid"  value="{{$data->PermanentAddress}}" ></div>
                    <div class="mb-3 col-md-4" id="elEmail"><label id="labelEmail" for="exampleFormControlInput1"
                            class="required form-label"> Email </label><input id="inputEmail" type="text" required
                            name="Email" class="form-control-sm form-control form-control-solid"  value="{{$data->Email}}" ></div>

                        <input required type="hidden" name="EmpID" value="{{$data->EmpID}}">
                        <input required type="hidden" name="EmployeeName" value="{{$data->EmployeeName}}">

                        <input required type="hidden" name="id" value="{{$data->id}}">



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light shadow-lg" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark shadow-lg">Save changes</button>

            </div>

        </form>
        </div>
    </div>
</div>

@endforeach
@endisset
