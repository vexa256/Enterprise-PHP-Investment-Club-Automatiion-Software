	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
      {{ HeaderBtn($Toggle="NewStaff", $Class="btn-danger", $Label="New Staff", $Icon="fa-plus")}}

        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
            <thead>
                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Satff Code</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th class="bg-dark text-light"> Actions</th>

                </tr>
            </thead>
            <tbody>
                @isset($Employees)
                @foreach ($Employees as $data )
                <tr>
                    <td>{{$data->StaffName}}</td>
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
                                  <li><a data-route="{{ route('EmpLeft', ['id'=>$data->id]) }}" data-msg="You sure you want to end this staff member's contract"  class="dropdown-item deleteConfirm" href="#">Contract Ended</a></li>

                                  <li><a data-bs-toggle="modal"  class="dropdown-item " href="#PersonalDetails{{$data->id}}">Personal Details</a></li>

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
                                    <li><a data-bs-toggle="modal"  class="dropdown-item " href="#NewKin{{$data->id}}">Add next of kins</a></li>

                                    <li><a class="dropdown-item " href="{{ route('ViewKins', ['id'=>$data->id]) }}">View next of kins</a></li>


                                    <li><a data-msg="You want to delete this staff member's record, This action is not reversible!!" data-route="{{ route('DelEmp', ['id'=>$data->id]) }}" class="dropdown-item deleteConfirm" href="#">Delete Record</a></li>
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
    <!--end::Card body-->

@include('Emp.NewEmp')
@include('Emp.BankDetails')
@include('Emp.PersonalInfo')
@include('Emp.NewKins')
