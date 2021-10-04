	<!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="NewDeptHead", $Class="btn-danger", $Label="New Department Head", $Icon="fa-plus")}}

          <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
              <thead>
                  <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                      <th>Satff Name</th>
                      <th>Heads Department</th>
                      <th>Reports To</th>
                      <th>Job Description</th>
                      <th>Actions</th>

                  </tr>
              </thead>
              <tbody>
                  @isset($Employees)
                  @foreach ($Employees as $data )
                  <tr>
                      <td>{{$data->EmployeeName}}</td>
                      <td>{{$data->Department}}</td>
                      <td>{{$data->ReportsTo}}</td>
                      <td>
                        <a data-bs-toggle="modal" href="#JD{{$data->id}}" class="btn shadow-lg btn-dark btn-sm">
                            <i class="fas fa-binoculars" aria-hidden="true"></i>
                        </a>
                    </td>

                    <td><div class="dropdown">
                        <button class="btn btn-sm  btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">


                            <li><a data-msg="You want to remove this staff member from the head of department list, This action is not reversible!!" data-route="{{ route('ReverseDept', ['id'=>$data->id]) }}" class="dropdown-item deleteConfirm" href="#">Reverse Role</a></li>
                        </ul>
                      </div></td>

                  </tr>
                  @endforeach
                  @endisset



              </tbody>
          </table>
      </div>
      <!--end::Card body-->

@include('Departments.NewDeptHead')
@include('Departments.JD')
