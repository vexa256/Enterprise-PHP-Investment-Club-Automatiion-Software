	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        <a href="{{ route('MgtEmp')}}" type="button" class="btn mx-1 float-end btn-sm mb-2 btn-danger" ><i class="fas me-1 fa-arrow-left" aria-hidden="true"></i>Back</a>

          <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
              <thead>
                  <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                      <th>Staff Name</th>
                      <th>Email</th>
                      <th>Next of Kin</th>
                      <th>Relationship</th>
                      <th>PhoneNumber</th>
                      <th>Current Address</th>
                      <th>Permanent Address</th>
                      <th class="bg-dark text-light"> Actions</th>



                  </tr>
              </thead>
              <tbody>
                  @isset($Kins)
                  @foreach ($Kins as $data )
                  <tr>
                      <td>{{$data->EmployeeName}}</td>
                      <td>{{$data->Name}}</td>
                      <td>{{$data->Email}}</td>
                      <td>{{$data->Relationship}}</td>
                      <td>{{$data->PhoneNumber}}</td>
                      <td>{{$data->CurrentAddress}}</td>
                      <td>{{$data->PermanentAddress}}</td>

                      <td>

                              <div class="dropdown">
                                  <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  Actions
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a data-bs-toggle="modal"  class="dropdown-item " href="#UpdateKins{{$data->id}}">Update</a></li>

                                    <li><a data-route="{{ route('DelKin', ['id'=>$data->id]) }}" data-msg="You sure you want to delete this next of kin record. This action is not reversible"  class="dropdown-item deleteConfirm" href="#">Delete</a></li>






                                  </ul>
                                </div>



                      </td>

                  </tr>
                  @endforeach
                  @endisset



              </tbody>
          </table>
      </div>
      <!--end::Card body-->

@include('Emp.UpdateKins')
