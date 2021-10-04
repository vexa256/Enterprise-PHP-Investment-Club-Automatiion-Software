<div class="modal fade"  id="TaxAssign">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Assign a tax to the  selected staff member's  payroll
                    <span class="text-danger font-weight-bold">
                        ({{$StaffName}})
                    </span>
                </h5>

                <!--begin::Close-->
                <a href="#" class="btn btn-info"  class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </a>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('AssignTax') }}" method="POST"  class="row">
                    <div class="mb-3 col-md-12  ">
                        <label id="label" for="" class="required form-label">Select tax category</label>
                        <select required name="TID" class="form-select  form-select-solid" data-control="select2" data-placeholder="Select an option">
                            <option></option>
                            @isset($Taxes)

                            @foreach ($Taxes as $data)
                            <option value="{{$data->TID}}">{{$data->Tax}}</option>
                            @endforeach
                            @endisset

                        </select>

                    </div>

                    @csrf

                    <input type="hidden" name="EmpID" value="{{$EmpID}}">

            </div>

            <div class="modal-footer">
                <a data-bs-toggle="modal" href="#" type="button" class="btn btn-info" data-bs-dismiss="modal">Close</a>


            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Assign Tax</button>



            </div>
        </form>
        </div>
    </div>
</div>
