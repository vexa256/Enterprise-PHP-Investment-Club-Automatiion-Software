<div class="text-inverse-dark fs-3 bg-dark py-5 pb-5 ps-4 mb-5">
    <span class="p3-3 me-3"> Manage all leave rights for the staff member  </span>  {{$StaffName}}
  </div><!--begin::Card body--><!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="NewAssign", $Class="btn-danger", $Label="Assign Leave", $Icon="fa-plus")}}

          <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
              <thead>
                  <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                      <th>Staff Name</th>
                      <th>Asigned Leave</th>
                      <th>Entitled Days</th>
                      <th>Designation</th>
                      <th>Department </th>
                      <th>Staff Code </th>
                      <th>Description</th>
                      <th>Revoke</th>


                  </tr>
              </thead>
              <tbody>
                  @isset($Employees)
                  @foreach ($Employees as $data )
                  <tr>
                      <td>{{$data->StaffName}}</td>
                      <td>{{$data->LeaveType}}</td>
                      <td>{{$data->Days}}</td>
                      <td>{{$data->Designation}}</td>
                      <td>{{$data->Department}}</td>
                      <td>{{$data->StaffCode}}</td>
                      <td>
                        <a data-bs-toggle="modal" href="#ViewLeaveDesc{{$data->id}}" class="btn btn-sm btn-dark">
                                 <i class="fas fa-binoculars" aria-hidden="true"></i>
                             </a>
                         </td>

                         <td>
                            <a data-msg="You want to revoke this  leave assignement" data-route="{{ route('RevokeLeaveRight', ['id'=>$data->AID]) }}" data-bs-toggle="modal" href="#" class="btn btn-sm btn-danger deleteConfirm">
                                <i class="fas fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>



                 </td>



                  </tr>
                  @endforeach
                  @endisset



              </tbody>
          </table>
      </div>
@include('leave.ViewDesc')
@include('leave.NewAssign')
