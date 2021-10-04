@isset($Contracts)
@foreach ($Contracts as $data )
<div class="modal fade"  id="BankDetails{{$data->id}}">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bank details for the contractor

                    <span class="text-danger font-bold">

                        {{$data->ContractorName}}
                    </span>
                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">

        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Name</th>
                    <th>Monthly Salary</th>
                    <th>Bank Name</th>
                    <th>Bank Branch</th>
                    <th>Account Holder</th>
                    <th>Account N.O</th>
                    <th>TIN</th>
                    <th>Bank Code</th>






                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{$data->ContractorName}}</td>
                    <td>{{$data->MonthlySalary}}</td>
                    <td>{{$data->BankName}}</td>
                    <td>{{$data->BankBranch}}</td>
                    <td>{{$data->AccountName}}</td>
                    <td>{{$data->AccountNumber}}</td>
                    <td>{{$data->TIN}}</td>
                    <td>{{$data->BankCode}}</td>






                </tr>




            </tbody>
        </table>
    </div>
    <!--end::Card body-->

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>


            </div>

        </div>
    </div>
</div>

@endforeach
@endisset
