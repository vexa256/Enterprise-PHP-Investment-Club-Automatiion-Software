	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">


        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                    <th>Contractor </th>
                    <th class="bg-dark text-light">Contract Validity </th>
                    <th class="bg-dark text-light">Contract Expiry </th>
                    <th>Gender </th>
                    <th>Photo</th>
                    <th>Satff Code</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th class="bg-dark text-light"> Actions</th>

                </tr>
            </thead>
            <tbody>
                @isset($Contracts)
                @foreach ($Contracts as $data )
                <tr>

                    <td>{{$data->ContractorName}}</td>
                    <td class="bg-danger text-light">{{$data->RecordStatus}}</td>
                    <td class="bg-dark text-light">{{ date('j F, Y', strtotime($data->ContractExpiry))}}</td>
                    <td>{{$data->Gender}}</td>
                    <td>

                        <a data-fslightbox="lightbox-basic" href="{{ asset($data->StaffPhoto) }}" class="btn btn-sm bg-dark">

                            <i class="fas fa-binoculars" aria-hidden="true"></i>
                        </a>

                 </td>
                    <td>{{$data->StaffCode}}</td>
                    <td>{{$data->Designation}}</td>
                    <td>{{$data->Department}}</td>

                    <td class="row fs-6">
                        <div class="col-md-6">
                            <div class="dropdown">
                                <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                 HR Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a data-route="{{ route('RenCon', ['id'=>$data->id]) }}" data-msg="You sure you want to this contract"  class="dropdown-item deleteConfirm" href="#">Renew Contract</a></li>

                                  <li><a data-bs-toggle="modal"  class="dropdown-item " href="#PersonalDetails{{$data->id}}">Personal Details</a></li>

                                  <li><a data-bs-toggle="modal"  class="dropdown-item " href="#OtherDetails{{$data->id}}">Other Details</a></li>

                                  <li><a data-bs-toggle="modal"  class="dropdown-item " href="#BankDetails{{$data->id}}">Bank Details</a></li>




                                </ul>
                              </div>


                        </div>

                        <div class="col-md-6">
                            <div class="dropdown">
                                <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Settings
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a data-bs-toggle="modal"  class="dropdown-item " href="#NewKins{{$data->id}}">Add next of kins</a></li>

                                    <li><a class="dropdown-item " href="{{ route('ViewKinsContracts', ['id'=>$data->id]) }}">View next of kins</a></li>


                                    <li class="d-none"><a data-msg="You want to delete this staff member's record, This action is not reversible!!" data-route="{{ route('DelCon', ['id'=>$data->id]) }}" class="dropdown-item deleteConfirm" href="#">Delete Record</a></li>
                                </ul>
                              </div>
                        </div>
                    </td>

                </tr>
                @endforeach
                @endisset



            </tbody>
        </table>
    </div>

@include('contracts.NewContract')
@include('contracts.PersonalDetails')
@include('contracts.OtherDetails')
@include('contracts.BankDetails')
@include('contracts.NewKins')
