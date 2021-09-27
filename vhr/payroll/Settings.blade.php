<div class="text-inverse-dark fs-3 bg-dark py-5 pb-5 ps-4">
  <span class="p3-3 me-3"> Net Salary : </span>  {{number_format($NetPay, 2)}} UGX
</div><!--begin::Card body-->
<div class="card-body pt-3 bg-light table-responsive">
    {{ HeaderBtn($Toggle="AssignBen", $Class="btn-danger", $Label="Assign Benefit", $Icon="fa-plus")}}

    {{ HeaderBtn($Toggle="AssignDeduction", $Class="btn-dark", $Label="Assign Deduction", $Icon="fa-plus")}}

    {{ HeaderBtn($Toggle="TaxAssign", $Class="btn-info", $Label="Assign Tax", $Icon="fa-cogs")}}
</div>
@include('payroll.Stats')


<div class="card-body mt-5 shadow-lg pt-5 bg-light table-responsive">
    <div class="row mt-5 ">
        <div class="col-md-4 ">
            <h3 class="h3">
                Payroll  Benefits
            </h3>
            <table class="table  table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                        <th>Benfit</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Delete</th>


                    </tr>
                </thead>
                <tbody>
                    @isset($BenefitsAssign)
                    @foreach ($BenefitsAssign as $data )
                      <tr>
                        <td>{{$data->Benefit}}</td>
                        <td>{{number_format($data->Amount, 2)}} UGX</td>
                        <td><a data-bs-toggle="modal" href="#BenDesc{{$data->id}}" class="btn btn-sm btn-info">
                            <i class="fas fa-binoculars" aria-hidden="true"></i>
                        </a>
                    </td>


                    <td class="">
                        <a href="#" class="btn  deleteConfirm btn-sm btn-danger" data-route="{{ route('DeleteBenefitsAssign', ['id'=>$data->BID]) }}" data-msg="You sure you want to delete this benefits assignment " >

                            <i class="fas fa-trash" aria-hidden="true"></i>

                        </a>

                    </td>
                    </tr>
                    @endforeach
                    @endisset



                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <h3 class="h3">
                Payroll Deductions
            </h3>
            <table class="table  table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                        <th>Deduction</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($AssignedDeductions)
                    @foreach ($AssignedDeductions as $data )
                      <tr>
                        <td>{{$data->Deduction}}</td>
                        <td>{{number_format($data->Amount, 2)}} UGX</td>
                        <td><a data-bs-toggle="modal" href="#DedDesc{{$data->id}}" class="btn btn-sm btn-dark">
                            <i class="fas fa-binoculars" aria-hidden="true"></i>
                        </a>
                    </td>

                    <td class="">
                        <a href="#" class="btn  deleteConfirm btn-sm btn-danger" data-route="{{ route('DeleteDeductionAssign', ['id'=>$data->DID]) }}" data-msg="You sure you want to delete this deductions assignment " >

                            <i class="fas fa-trash" aria-hidden="true"></i>

                        </a>

                    </td>

                    </tr>
                    @endforeach
                    @endisset



                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <h3 class="h3">
                Payroll Taxes
            </h3>
            <table class="table  table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                        <th>Tax</th>
                        <th>Percentage</th>
                        <th>Description</th>
                        <th>Delete</th>


                    </tr>
                </thead>
                <tbody>
                    @isset($AssignedTaxes)
                    @foreach ($AssignedTaxes as $data )
                      <tr>
                        <td>{{$data->Tax}}</td>
                        <td>{{$data->Percentage}}%</td>
                        <td><a data-bs-toggle="modal" href="#TaxDesc{{$data->id}}" class="btn btn-sm btn-dark">
                            <i class="fas fa-binoculars" aria-hidden="true"></i>
                        </a>
                    </td>

                    <td class="">
                        <a href="#" class="btn  deleteConfirm btn-sm btn-danger" data-route="{{ route('DeleteTaxAssign', ['id'=>$data->TID]) }}" data-msg="You sure you want to delete this tax assignment " >

                            <i class="fas fa-trash" aria-hidden="true"></i>

                        </a>
                    </td>

                    </tr>
                    @endforeach
                    @endisset



                </tbody>
            </table>
        </div>
    </div>


  </div>


@include('payroll.BenDesc')
@include('payroll.AssignBen')
@include('payroll.AssignTax')
@include('payroll.AssignDed')
@include('payroll.TaxDesc')
@include('payroll.DedDesc')
