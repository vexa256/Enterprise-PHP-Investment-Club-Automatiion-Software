<div class="card-body pt-3 bg-light table-responsive">
    {{ HeaderBtn($Toggle="NewAssign", $Class="btn-danger", $Label="Assign Supervisor", $Icon="fa-plus")}}

</div>

<!--begin::Alert-->
<div class="alert alert-primary">
    <!--begin::Icon-->
    <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">
        <i class="fas fa-user fa-3x" aria-hidden="true"></i>
    </span>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column">
        <!--begin::Title-->
        <h4 class="mb-1 text-dark">{{$Employees->StaffName}}</h4>
        <!--end::Title-->
        <!--begin::Content-->
        <span>The table below shows the supervisor assigned to the staff member {{$Employees->StaffName}}</span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Alert-->
<div class="card-body mt-5 shadow-lg pt-5 bg-light table-responsive">
      <div class="row mt-5 ">
          <div class="col-md-12 ">

              <table class="table mytable table-rounded table-bordered  border gy-3 gs-3">
                  <thead>
                      <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                        <th>Supervisor</th>
                        <th>Supervisor Designation</th>
                        <th>Supervisor Department</th>
                        <th>Staff Member</th>
                        <th>Staff Department </th>
                        <th>Staff  Designation</th>
                        <th>Staff  Code</th>
                        <th>Date Assigned</th>

                        <th>Actions</th>

                      </tr>
                  </thead>
                  <tbody>
                    @isset($supervisors)
                    @foreach ($supervisors as $data )
                      <tr>
                          <td>{{$data->Supervisor}}</td>
                          <td>{{$data->StaffMemberDesignation}}</td>
                          <td>{{$data->SupervisorDepartment}}</td>
                          <td>{{$data->StaffMember}}</td>
                          <td>{{$data->StaffMemberDepartment}}</td>
                          <td>{{$data->StaffMemberDesignation}}</td>
                          <td>{{$data->StaffMemberCode}}</td>
                          <td> {{date('d-M-Y', strtotime($data->ct)); }}</td>

<td class="row fs-6">
  <div class="dropdown">
      <button class="btn btn-sm  btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      Action
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

          <li><a data-route="{{ route('ReverseAssign', ['id'=>$data->id]) }}" data-msg="You sure you want to reverse this staff member's supervisor assignment? "  class="dropdown-item deleteConfirm" href="#">Reverse Assignment</a></li>


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

@include('supervisors.NewAssign')
