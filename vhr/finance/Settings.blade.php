<!--begin::Card body-->
<div class="card-body pt-3 bg-light table-responsive">
    {{ HeaderBtn($Toggle="NewBenefit", $Class="btn-danger", $Label="New Benefit", $Icon="fa-plus")}}

    {{ HeaderBtn($Toggle="NewDeduction", $Class="btn-dark", $Label="New Deduction", $Icon="fa-plus")}}

    {{ HeaderBtn($Toggle="MgtTaxes", $Class="btn-info", $Label="Manage Taxes", $Icon="fa-cogs")}}
</div>
<div class="card-body shadow-lg pt-3 bg-light table-responsive">
    <div class="row">
        <div class="col-md-6">
            <h3 class="h3">
                Manage Benefits
            </h3>
            <table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                        <th>Benfit</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Actions</th>


                    </tr>
                </thead>
                <tbody>
                    @isset($Benefits)
                    @foreach ($Benefits as $data )
                      <tr>
                        <td>{{$data->Benefit}}</td>
                        <td>{{number_format($data->Amount)}} UGX</td>
                        <td><a data-bs-toggle="modal" href="#BenefitDesc{{$data->id}}" class="btn btn-sm btn-info">
                            <i class="fas fa-binoculars" aria-hidden="true"></i>
                        </a>
                    </td>

                    <td class="row fs-6">
                            <div class="dropdown">
                                <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                               Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a data-bs-toggle="modal"  class="dropdown-item " href="#Update{{$data->id}}">Update</a></li>

                                  <li><a data-route="{{ route('DeleteBenefit', ['id'=>$data->id]) }}" data-msg="You sure you want to delete this benefit. This action is not reversible"  class="dropdown-item deleteConfirm" href="#">Delete</a></li>


                                </ul>
                              </div>



                    </td>

                    </tr>
                    @endforeach
                    @endisset



                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <h3 class="h3">
                Manage Deductions
            </h3>
            <table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                        <th>Deduction</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Actions</th>


                    </tr>
                </thead>
                <tbody>
                    @isset($Deductions)
                    @foreach ($Deductions as $data )
                      <tr>
                        <td>{{$data->Deduction}}</td>
                        <td>{{number_format($data->Amount)}} UGX</td>
                        <td><a data-bs-toggle="modal" href="#Deductions{{$data->id}}" class="btn btn-sm btn-dark">
                            <i class="fas fa-binoculars" aria-hidden="true"></i>
                        </a>
                    </td>

                    <td class="row fs-6">
                            <div class="dropdown">
                                <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                               Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a data-bs-toggle="modal"  class="dropdown-item " href="#UpdateDeduction{{$data->id}}">Update</a></li>

                                  <li><a data-route="{{ route('DeleteDeduction', ['id'=>$data->id]) }}" data-msg="You sure you want to delete this deduction category, This action is not reversible"  class="dropdown-item deleteConfirm" href="#">Delete</a></li>


                                </ul>
                              </div>



                    </td>

                    </tr>
                    @endforeach
                    @endisset



                </tbody>
            </table>
        </div>
    </div>


  </div>
  <!--end::Card body-->
@include('finance.NewBenefit')
@include('finance.NewDeduction')
@include('finance.BenefitDesc')
@include('finance.UpdateBenefit')
@include('finance.DeductionDesc')
@include('finance.UpdateDeduction')
@include('finance.Taxes')
@include('finance.NewTax')
@include('finance.UpdateTax')
@include('finance.TaxDesc')

