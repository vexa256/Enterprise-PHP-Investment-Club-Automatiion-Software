
<div class="modal fade"  id="MgtTaxes">
<div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header bg-gray">
            <h5 class="modal-title">Manage tax categories

            </h5>

            <!--begin::Close-->
            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                <i class="fas fa-2x fa-times" aria-hidden="true"></i>
            </div>
            <!--end::Close-->
        </div>

        <div class="modal-body ">


            <div class="row">
                <div class="col-md-12">
                    {{ HeaderBtn2($Toggle="NewTax", $Class="btn-info", $Label="New Tax", $Icon="fa-plus")}}

                    <table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
                        <thead>
                            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                                <th>Tax</th>
                                <th>Percentage</th>
                                <th>Description</th>
                                <th>Actions</th>


                            </tr>
                        </thead>
                        <tbody>
                            @isset($Taxes)
                            @foreach ($Taxes as $data )
                                <tr>
                                <td>{{$data->Tax}}</td>
                                <td>{{$data->Percentage}} %</td>
                                <td><a data-bs-toggle="modal" href="#TaxDesc{{$data->id}}" data-bs-dismiss="modal" class="btn btn-sm btn-info">
                                    <i class="fas fa-binoculars" aria-hidden="true"></i>
                                </a>
                            </td>

                            <td class="row fs-6">
                                    <div class="dropdown">
                                        <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a data-bs-toggle="modal" data-bs-dismiss="modal" class="dropdown-item " href="#UpdateTax{{$data->id}}">Update</a></li>

                                            <li><a data-route="{{ route('DeleteTax', ['id'=>$data->id]) }}" data-msg="You sure you want to delete this tax category. This action is not reversible"  class="dropdown-item deleteConfirm" href="#">Delete</a></li>


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

        <div class="modal-footer">
            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>


        </div>

    </div>
</div>
</div>
