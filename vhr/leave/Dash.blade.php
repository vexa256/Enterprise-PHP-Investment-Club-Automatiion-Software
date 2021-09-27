<div class="text-inverse-dark fs-6 bg-dark py-5 pb-5 ps-4 mb-5">
    <span class="p3-3 me-3"> Leave applications pending review
  </div><!--begin::Card body--><!--begin::Card body-->
    <div class="card-body pt-3 bg-light shadow-lg table-responsive">
        {{ HeaderBtn($Toggle="Declined", $Class="btn-danger", $Label="Declined", $Icon="fa-times")}}

        {{ HeaderBtn($Toggle="Approved", $Class="btn-dark", $Label="Approved", $Icon="fa-check")}}


          <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
              <thead>
                  <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                      <th>Staff Name</th>
                      <th>Asigned Leave</th>
                      <th>Entitled Days</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Spent Days</th>
                      <th>Unused Days</th>
                      <th>Approval Status</th>
                      <th>Leave Validity</th>
                      <th>Actions</th>



                  </tr>
              </thead>
              <tbody>
                  @isset($Apps)
                  @foreach ($Apps as $data )
                  <tr>

                      <td>{{$data->StaffName}}</td>
                      <td>{{$data->LeaveType}}</td>
                      <td>{{$data->Days}}</td>
                      <td>{{$data->StartDate}}</td>
                      <td>{{$data->EndDate}}</td>
                      <td>{{$data->SpentDays}}</td>
                      <td>{{$data->UnusedDays}}</td>
                      <td>{{$data->ApprovalStatus}}</td>
                      <td>{{$data->ValidityStatus}}</td>
                      <td class="row fs-6">
                        <div class="dropdown">
                            <button class="btn btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                           Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a data-bs-toggle="modal"  class="dropdown-item " href="#AppLetter{{$data->LLID}}">Application Letter</a></li>

                              <li><a data-route="{{ route('ApproveLeave', ['id'=>$data->LLID]) }}" data-msg="You sure you want to approve this Leave application, This action is not reversible"  class="dropdown-item deleteConfirm" href="#">Approve</a></li>


                              <li><a data-route="{{ route('DeclineLeave', ['id'=>$data->LLID]) }}" data-msg="You sure you want to decline this application letter, This action is not reversible"  class="dropdown-item deleteConfirm" href="#">Decline</a></li>


                            </ul>
                          </div>



                </td>




                  </tr>
                  @endforeach
                  @endisset



              </tbody>
          </table>
      </div>


@include('leave.AppLetter')
@include('leave.Approved')
@include('leave.Declined')
